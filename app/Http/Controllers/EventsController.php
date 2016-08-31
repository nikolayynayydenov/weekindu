<?php

namespace App\Http\Controllers;

use App\ExtraParam;
use App\ExtraParamValue;
use App\Event;
use App\Invitation;
use App\Http\Requests;
use App\Helpers\Images;
use App\Helpers\StringModifier;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class EventsController extends Controller
{
    public function __construct() {

        /*
         * Users can only edit/delete their own events.
         * This is achieved using the user_is_host_of_event custom middleware
         */

        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('user_is_host_of_event', ['only' => ['edit', 'destroy', 'showStatistics']]);
        $this->middleware('event_exists', ['only' => ['show', 'showStatistics']]);
        $this->middleware('event_is_public', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            // the user is logged
            $userId = Auth::id();
            $events =  Event::where('host', $userId) ->orWhere('is_public', true);
        }
        else{
            $events =  Event::where('is_public', true);
        }

        $events = $events->orderBy('created_at', 'desc')->paginate(4);
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreEventRequest $request)
    {
        /*
         * Normalization:
         */

        $data = $request->except('_token');

        $trimData = function ($item) {
            if (is_array($item)) {
                $item = array_map('trim', $item);
                return $item;
            }
            return trim($item);
        };

        /*
         * Trim everything in the $data array.
         * Using custom trimming function because
         * some elements from $data are arrays
         */
        $data = array_map($trimData, $data);

        /*
         * Generate the invitation code:
         */

        $invitationCode = str_random(16);

        /*
         * Extract coordinates:
         */

        if (!empty($data['location_coordinates'])) {
            $coords = preg_replace('/[\(\)]/', '', $data['location_coordinates']);
            $coords = explode(', ', $coords);
            $x = $coords[0];
            $y = $coords[1];
        }

        /*
         * Store background photo if set:
         */

        $backgroundPhoto = Images::storeEventBackground(
            $request->hasFile('background_photo')
            ? $request->file('background_photo')
            : false
        );

        /*
         * Check if images exist:
         */
        if(!empty($data['type'])) {
            $typeImg = StringModifier::convertToImagePath($data['type']);
            $typeImgExists = file_exists(public_path('images\create-event\type\\'.$typeImg));
        }

        if(!empty($data['dress-code'])) {
            $dressCodeImg = StringModifier::convertToImagePath($data['dress-code']);
            $dressCodeImgExists = file_exists(public_path('images\create-event\dress-code\\' . $dressCodeImg));
        }
        /*
         * Store into db
         */

        $event = new Event();
        $event->title = $data['title'];
        $event->date = $data['date'];
        $event->time = $data['time'];
        $event->description = $data['description'];
        $event->is_public = !empty($data['is_public']);
        $event->type = empty($data['type']) ? '' : $data['type'];
        $event->type_image = empty($data['type']) || !$typeImgExists ? 'other.jpg' : $typeImg;
        $event->dress_code = empty($data['dress-code']) ? '' : $data['dress-code'];
        $event->dress_code_image = empty($data['dress-code']) || !$dressCodeImgExists ? 'other.jpg' : $dressCodeImg;
        $event->location_string = empty($data['location_string']) ? '' : $data['location_string'];
        $event->location_x = isset($x) ? $x : '';
        $event->location_y = isset($y) ? $y : '';
        $event->background_photo = $backgroundPhoto;
        $event->host = $request->user()->id;
        $event->invitation_code = $invitationCode;
        $event->save();

        /*
         * Store extras:
         */
        $storeParams = false;

        if (!empty($data['extras'])) {
            $storeParams = true;
            $extras = json_decode($data['extras']);
        } else {
            $extras = json_decode('{}');
        }

        if (!empty($data['music'])) {
            $storeParams = true;
            $extras->{'music'} = $data['music'];
        }

        if (!empty($data['food'])) {
            $storeParams = true;
            $extras->{'food'} = $data['food'];
        }

        if (!empty($data['drinks'])) {
            $storeParams = true;
            $extras->{'drinks'} = $data['drinks'];
        }

        if($storeParams) {
            foreach ($extras as $key => $extra) {
                $newExtra = new ExtraParam();
                $newExtra->event_id = $event->id;
                $newExtra->key = $key;
                $newExtra->save();

                foreach ($extra as $val) {
                    $newValue = new ExtraParamValue();
                    $newValue->extra_id = $newExtra->id;
                    $newValue->value = $val;
                    $newValue->save();
                }
            }
        }

        /*
         * Redirect to the show event action
         */

        return redirect('/statistics/'.$event->id);// the $event->id property holds the last inserted id
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $extrasObjects = $event->extras;

        $extras = [];
        $allowedExtras = ['food', 'drinks', 'music'];
        foreach ($extrasObjects as $extraObject) {
            foreach ($extraObject->values as $value) {
                if(in_array($extraObject->key, $allowedExtras)) {
                    $extras[$extraObject->key][] = $value->value;
                }
            }
        }

        $event->dress_code_image_path ='/images/create-event/dress-code/'.$event->dress_code_image;
        $event->dress_code_image_full_path =
            public_path('images\create-event\dress-code\\'.$event->dress_code_image);

        //dd($event->dress_code_image_full_path);

        return view('events.show')
            ->with('event', $event)
            ->with('extras', $extras);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id); // the event that we want to edit

        if ($event !== null) {
            // if an event with the given id exists

            return view('events.edit')->with('event', $event); // pass the event to the view so we can access it there
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
         * TO DO: If the host of the event is not the same as the
         * logged in user, do not update
         */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/user/my-events');
    }

    public function showStatistics($id) {
        $event = Event::find($id);
        $extras = $event->extras;
        $eev = $event->chosenExtras; // what if there are no eevs for this event?

        $stats = [];

        foreach ($extras as $extra) {
            $stats[$extra->key] = [];

            $extraValues = $extra->values;
            $eevItems = $eev->where('extra_id', $extra->id);
            // if this extra has been chosen at least once:

            foreach ($extraValues as $value) {
                $stats[$extra->key][$value->value] = 0;
                $eevItemsValuesSelected = $eevItems->where('value_id', $value->id);
                if ($eevItemsValuesSelected != null) {
                    // if this value is set:
                    foreach ($eevItemsValuesSelected as $eevValue) {
                        $stats[$extra->key][$value->value]++;
                    }
                }
            }
        }

        $invitations = Invitation::where('invitation_code', $event->invitation_code)
            ->get(['id', 'guest_name','accepted', 'created_at']);

        return view('events.show-statistics')
            ->with('event', $event)
            ->with('stats', $stats)
            ->with('guests', $invitations);
    }
}
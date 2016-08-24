<?php

namespace App\Http\Controllers;

use App\Eev;
use App\ExtraParam;
use App\ExtraParamValue;
use App\Event;
use App\Http\Requests;
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
        $this->middleware('user_is_host_of_event', ['only' => ['edit', 'destroy']]);
        $this->middleware('event_exists', ['only' => ['show']]);
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

        $events = $events->orderBy('created_at', 'desc')->get();
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
         * Store into db
         */

        $event = new Event();
        $event->title = $data['title'];
        $event->date = $data['date'];
        $event->description = $data['description'];
        $event->is_public = empty($data['is_public']) ? false : true;
        $event->type = empty($data['type']) ? '' : $data['type'];
        $event->dress_code = empty($data['dress-code']) ? '' : $data['dress-code'];
        $event->music = empty($data['music']) ? '' : json_encode($data['music']);
        $event->food = empty($data['food']) ? '' : json_encode($data['food']);
        $event->drinks = empty($data['drinks']) ? '' : json_encode($data['drinks']);
        $event->location_string = empty($data['location_string']) ? '' : $data['location_string'];
        $event->location_coordinates = empty($data['location_coordinates']) ? '' : $data['location_coordinates'];
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

        return redirect('/event/'.$event->id);// the $event->id property holds the last inserted id
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
        $event->food = json_decode($event->food);
        $event->drinks = json_decode($event->drinks);
        $event->music = json_decode($event->music);

        $eev = Eev::where('event_id', $id)->get(); // what if there are no eevs for this event?

        $stats = [];

        foreach ($eev as $item) {
            if (!array_key_exists($item->extra->key, $stats)) {
                $stats[$item->extra->key] = [];
            }

            if (!array_key_exists($item->value->value, $stats[$item->extra->key])) {
                $stats[$item->extra->key][$item->value->value] = 0;
            }

            $stats[$item->extra->key][$item->value->value] += 1;
        }

        return view('events.show')
            ->with('event', $event)
            ->with('stats', $stats);
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

        return redirect('/event');
    }
}
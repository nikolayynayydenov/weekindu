<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

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
        $events = Event::where('is_public', true)->get(); // all public events

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
        // normalization:

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
        $event->extras = empty($data['extras']) ? '' : json_encode($data['extras']);
        $event->host = $request->user()->id;
        $event->save();

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
        $event->extras = json_decode($event->extras);
        return view('events.show')->with('event', $event);
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

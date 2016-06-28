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
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index');
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
    public function store(Request $request)
    {        
        // normalization:
        
        $request->all()['title'] = trim($request->all()['title']);
        $request->all()['description'] = trim($request->all()['description']);
        
        // validation:
        
        $rules = [
            'title' => 'required|max:80',
            'description' => 'required'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)                    
                    ->withInput();
        } else {
        // store into db
        
        $event = new Event();
        $event->title = $request->all()['title'];
        $event->host = $request->user()->id; // $request->user()->id hold the current logged user's id. 
        $event->description = $request->all()['description'];
        $event->save();
        
        // redirect to the edit form to the creation of the event can continue
        
        return redirect('/event/'.$event->id.'/edit');// the $event->id property holds the last inserted id
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

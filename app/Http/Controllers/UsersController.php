<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\User;
use Crypt;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $events = $user->events;

        return view('users.show')
            ->with('user', $user)
            ->with('events', $events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
         * TODO: check if user exists
         */
        $user = User::find($id);

        return view('users.edit')->with('user', $user);
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
    
    /*
     * Get the JSON for the autocompletion in the 
     * form for creating a new event
     *       
     */
    
    public function getJson() {        
        $term = strtolower(Input::get('term'));
        // the value has to be "term" otherwise it wont work
        
        // take some users
        $users = User::select('id', 'first_name', 'last_name', 'name', 'avatar')
                ->where('first_name', 'like', '%'.$term.'%')
                ->orderBy('first_name', 'asc')
                ->take(5)
                ->get();        
        
        $return_array = [];
        
        foreach($users as $user) {
            // generate the array that is going to be transformed into json
            
            $return_array[] = [
                'id' => Crypt::encrypt($user->id),
                'fullName' => $user->first_name.' '.$user->last_name,
                'name' => isset($user->name) ? $user->name : false,
                'avatar' => $user->avatar,
                'value' => $user->first_name.' '.$user->last_name.' '.(isset($user->name) ? ' ('.$user->name.')' : '')
            ];            
        }
        
        return response()->json($return_array);
    }
}

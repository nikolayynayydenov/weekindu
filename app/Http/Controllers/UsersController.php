<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\User;
use Crypt;

class UsersController extends Controller
{
    public function __construct()
    {

    }

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
        if ($user = User::find($id)) {
            $events = $user->events;
            return view('users.show')
                ->with('user', $user)
                ->with('events', $events);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == auth()->user()->id) {
            $user = User::find($id);
            return view('users.edit')->with('user', $user);
        } else {
            abort(401);
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
        $data = $request->all();

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $name = $data['name'];
        $password_email = $data['password_email'];
        $email = $data['email'];
        $password = $data['password'];
        $old_password = $data['old_password'];
        $avatar = AvatarsController::storeImage(isset($data['avatar']) ? $data['avatar'] : false);

        $this->validate($request,[
            'first_name' => 'max:35',
            'last_name' => 'max:35',
            'name' => 'sometimes|max:20',
            'email' => 'email|max:255|confirmed',
            'password' => 'min:4|confirmed',
            'avatar' => 'sometimes|image|max:1000',
        ]);

        $user = User::find($id);

        if($email != null){
            if($password_email != null &&  Hash::check($password_email, $user->password)){
                $user->email = $email;
            }
        }

        if($first_name != null){
            $user->first_name = $first_name;
        }
        if($last_name != null){
            $user->last_name = $last_name;
        }
        if($name != null){
            $user->name = $name;
        }

        if($password != null && $old_password != null){
            if(Hash::check($old_password, $user->password)){
                $user->password = bcrypt($password);
            }
        }

        if($avatar != 'default.png'){

            $user->avatar = $avatar;
        }


        $user->save();

        return view('users.edit')->with('user', $user);
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
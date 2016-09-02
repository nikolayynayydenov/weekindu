<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Images;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'showMyEvents']]);
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
        $user = User::find($id);
        $data = $request->except('_token');

        $validator = Validator::make($data, [
            'first_name' => 'max:35',
            'last_name' => 'max:35',
            'name' => 'sometimes|max:20|unique:users,name',
            'email' => 'email|max:255|confirmed',
            'password' => 'min:4|confirmed',
            'avatar' => 'sometimes|image|max:1000',
        ]);

        if ($validator->fails() && $user->name != $data['name']) {
                return redirect('user/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $name = $data['name'];
        $password_email = $data['password_email'];
        $email = $data['email'];
        $password = $data['password'];
        $old_password = $data['old_password'];
        
        /*
         * Substitute old avatar with a new one
         */
        
        if($request->hasFile('avatar')) {
            $path = 'images'.DIRECTORY_SEPARATOR.'user-avatars'.DIRECTORY_SEPARATOR.$user->avatar;
            Images::deleteImage($path, $user->avatar);
            $avatar = Images::storeImage($request->file('avatar'), 'user-avatars');
        }

        if($email != null) {
            if ($password_email != null && Hash::check($password_email, $user->password)) {
                $user->email = $email;
            } else {
                return redirect('user/' . $id . '/edit')
                    ->withErrors('The password is not valid.')
                    ->withInput();
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
            } else {
                return redirect('user/' . $id . '/edit')
                    ->withErrors('The password is not valid.')
                    ->withInput();
            }
        }

        $user->avatar = $avatar;
        $user->save();

        return redirect('/user/'.$id.'/edit')
            ->with('message', 'Successfully changed');
    }

    public function showMyEvents() {
        $events =  Auth::user()
            ->events()
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        
        return view('users.my-events')->with('events', $events);
    }
}
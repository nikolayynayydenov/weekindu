<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Helpers\Images;

use Socialite;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // TODO the user should be able to create circle images (through front end - UI)

        return Validator::make($data, [
            'first_name' => 'required|max:35',
            'last_name' => 'required|max:35',
            'name' => 'sometimes|max:20|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|confirmed',
            'avatar' => 'sometimes|image|max:1000',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $avatar = Images::storeImage(!empty($data['avatar']) ?
            $data['avatar'] : false, 'user-avatars');

        return User::create([
            'first_name' => trim($data['first_name']),
            'last_name' => trim($data['last_name']),
            'name' => $data['name'] === '' ? null : trim($data['name']),
            'email' => trim($data['email']),
            'password' => bcrypt($data['password']),
            'avatar' => $avatar
        ]);
    }



    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $driver = Socialite::driver('facebook')
                ->fields([
                    'name',
                    'first_name',
                    'last_name',
                    'email'
                ]);

            $user = $driver->user();
            //$user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }


    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($authUser){
           return $authUser;
        }

        $avatarStr = 'https://graph.facebook.com/v2.6/'.$facebookUser->id.'/picture?type=large';
        $avatarStr = (string)$avatarStr;

        $avatarStr = Images::storeAvatar($avatarStr);

        return User::create([
            'first_name' => $facebookUser->user['first_name'],
            'last_name' => $facebookUser->user['last_name'],
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => $avatarStr //'https://graph.facebook.com/v2.6/'.$facebookUser->id.'/picture?type=large'
        ]);
    }
}
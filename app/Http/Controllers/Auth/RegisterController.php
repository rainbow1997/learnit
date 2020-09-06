<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->redirectTo=$this->redirectTo();

        $this->middleware('guest');
    }
    public function redirectTo()
    {
        return app()->getLocale() . '/home';
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nationalcode' => ['required', 'digits:10'],
            'birthdate' => ['required', 'date', 'max:255'],
            'mobile' => ['required', 'digits_between:11,14'],
            'secondMobile' => ['required', 'digits_between:11,14'],
            'telephone' => ['required', 'digits_between:11,14'],
            'webpage' => ['active_url', 'max:255'],
            'education_place'=>['string','max:255'],
            'study_field'=>['string','max:255'],
            'study_orention'=>['string','max:255'],
            'avatar'=>['file|size:2048','image']









        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'nationalcode' => $data['nationalcode'],
            'birthdate' => $data['birthdate'],
            'mobile' => $data['mobile'],
            'secondMobile' => $data['secondMobile'],
            'telephone' => $data['telephone'],
            'webpage' => $data['webpage'],
            'education_place' => $data['education_place'],
            'study_field' => $data['study_field'],
            'study_orention' => $data['study_orention'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        sendWelcomeNotification($user);
        return $user;
    }
    private function sendWelcomeNotification(\App\User $user)
    {
        Notification::send($user,new sendWelcomeNotification(USER));
    }
}

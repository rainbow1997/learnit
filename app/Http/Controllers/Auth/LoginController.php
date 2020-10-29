<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Validator as Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth as Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectTo()
    {
        return app()->getLocale() . '/home';
    }
    public function __construct()
    {

        //$this->redirectTo=$this->redirectTo();
        $this->middleware('guest')->except('logout');
    }
    public function validator(array $data)
    {
        $rules=[
          'email'=>['required','string','email'],
          'password'=>['required','string','min:8']
        ];
        return Validator::make($data,$rules);
    }
    public function create(Request $request)
    {

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'status' => 1])) {
            // The user is active, not suspended, and exists.
            $this->redirectTo();
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Users\User as User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;

use Illuminate\Http\Request;
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

    /*
    user Object that get object name from user input(userType)
    */
    private $userObj;
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
    public function __construct(Request $request)
    {
        //$this->redirectTo=$this->redirectTo();

        $this->middleware('guest');

    //die($this->userObj);
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
        if(in_array(request()->input('person_type'),config('auth.account_types'),TRUE))
            $this->userObj='App\Users\\'.ucfirst(request()->input('person_type'));
        else
            abort(500,'userType is wrong');
        $usersType=\App\Users\User::getAllTypes();
         $result=[
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nationalcode' => ['required', 'digits:10'],
            //'person_type'=>['required','in:'.implode(',',$usersType)],
            'birthdate' => ['required', 'date', 'max:255'],
            'mobile' => ['required', 'digits_between:11,14'],
            'second_mobile' => ['required', 'digits_between:11,14'],
            'telephone' => ['required', 'digits_between:11,14'],
            'webpage' => ['active_url', 'max:255'],
            'education_place'=>['string','max:255'],
            'study_field'=>['string','max:255'],
            'study_orention'=>['string','max:255'],
           // 'avatar'=>['file|size:2048']




        ];

        //special validation for each class(userType)

        array_merge($result,$this->userObj::getLocalValidation());

         return Validator::make($data, $result);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return App\Users\User
     */
    protected function create(array $data)
    {
        //die('oomadinja');
        $userClass='App\Users\\'.ucfirst($data['person_type']);//set class from variable's name
        $regData=[
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'nationalcode' => $data['nationalcode'],
            'birthdate' => $data['birthdate'],
            'mobile' => $data['mobile'],
            'second_mobile' => $data['second_mobile'],
            'telephone' => $data['telephone'],
            'webpage' => $data['webpage'],
            'education_place' => $data['education_place'],
            'study_field' => $data['study_field'],
            'study_orention' => $data['study_orention'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];
        //assign local fillableItem into create static method of UsersObject
        //die(var_dump($userObj::getFillableItemKeys()));


        if($userClass::getFillableItemKeys()!=FALSE)
            foreach($userClass::getFillableItemKeys() as $item)
            {
                $regData[$item]=$data[$item];

            }

       // $user=$userClass::create(new $userClass,$regData);
            //sendWelcomeNotification($user);


        $user=$userClass::createByForm(new $userClass,$regData);
        $user::create($user,$regData);
            //$user->create(new $userClass,$regData);
        //for method overriding
        //$user=new $userClass;
        //$user->create(new $userClass,$regData);

        return $user;

    }
    public function sendWelcomeNotification(object $user)
        //\App\User $user)
    {
      //  Notification::send($user,new Notification\welcomeNotification);
    }
    public function ajaxShowUserTypeRegForm(Request $request)
    ////$locale is for fixing the bug because one variable
    //just get locale variable from route
    {
        if(in_array($request->input('selectVal'),config('auth.account_types'),TRUE))
        {

          //  return 'sdf';
          //return ("auth/register_".$request->input('selectVal'));
          return view("auth/register_".$request->input('selectVal'))->render();
        }
        else
            return 'Error from input that sent.';
    }

}

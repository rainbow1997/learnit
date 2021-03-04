<?php

namespace App\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth as Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    //It's important that all files for view or etc should follow its owner lower  name
    //ex:register.blade.php Is Original then we have register.student.blade.php
    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname', 'email', 'password','nationalcode','birthdate',
        'mobile','second_mobile','telephone','webpage','education_place','study_field',
        'study_orention','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Learnit functions
    public function __construct(array $regData=[],object $userObj=null)
    {
        if($userObj!=NULL) {
            $this->setUserableIdAttribute($userObj->id);
            $this->setUserableTypeAttribute(get_class($userObj));
        }
        parent::__construct($regData);

    }


    public static function getAllTypes()
    {
        return config('auth.account_types');

    }

//    public abstract function setLocaleFillable();
//    public abstract function getLocaleFillable();
//    public abstract static function getLocalValidation();
//    public abstract function getFillableItemKeys();

    public function userable()
    {
        return $this->morphTo();
    }
    public function wallet()
    {
        return $this->hasOne(User::class,'id');
    }



    public function setUserableIdAttribute($id)
    {
        $this->attributes['userable_id']=$id;
    }
    public function setUserableTypeAttribute($type)
    {
        $this->attributes['userable_type']=$type;
    }

    public static function create(object $userObj,array $regData)//chon teacher null mire behesh az register Controller
    {

        $user=new User($regData,$userObj);
//        $userWallet=new Wallet($user);
        $copy=clone $user;
//        $userWallet->save();
        $user->save();
        return true;
        // $/user->create($userObj);
    }
//    public function roles()
//    {
//        return $this->belongsToMany('App\Users\Role','role_user')->wherePivot('status',1);;
//    }
}

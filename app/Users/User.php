<?php

namespace App\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
        'mobile','secondMobile','telephone','webpage','education_place','study_field',
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


}

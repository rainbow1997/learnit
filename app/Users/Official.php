<?php
namespace App\Users;
use Illuminate\Database\Eloquent\Model as Model;

class Official extends User
{
    //public function setPersonnelCode();
    //public function getPersonnelCode();
    protected $fillable = [];
    public function user() //user be official
    {
        return $this->morphOne('App\Users\User','userable');
    }
    public function officialable() //official be teacher
    {
        return $this->morphTo();
    }
}

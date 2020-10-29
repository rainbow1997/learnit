<?php
namespace App\Users;
use Illuminate\Database\Eloquent\Model as Model;

class Official extends User
{
    //public function setPersonnelCode();
    //public function getPersonnelCode();
    public function __construct(object $userObj)
    {
        $this->setOfficialableIdAttribute($userObj->id);
        $this->setOfficialableTypeAttribute(get_class($userObj));

    }
    public function setOfficialableIdAttribute($id)
    {
        $this->attributes['officialable_id']=$id;
    }
    public function setOfficialableTypeAttribute($type)
    {
        $this->attributes['officialable_type']=$type;
    }
    protected $table='officials';
    //protected $fillable = [];
    public function user() //user be official
    {
        return $this->morphOne('App\Users\User','userable');
    }
    public function officialable() //official be teacher
    {
        return $this->morphTo();
    }
//    public static function create($data)
//    {
//
//        parent::create($data);
//
//    }
    public static function create(object $userObj,array $regData)//$attributes hamoon sheyei az Teacher
    {
        $official=new Official($userObj);
        $official->save();
        parent::create($official,$regData);

//        $attributes['userable_id']=$official->id;
//        $attributes['userable_type']=$official->type;
//        dd($attributes);
//        $user->create($attributes);
//        dd('sdfg');
    }
}

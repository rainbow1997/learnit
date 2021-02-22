<?php
namespace App\Users;
use Illuminate\Database\Eloquent\Model as Model;

class Official extends User
{
    protected $table='officials';

    //public function setPersonnelCode();
    //public function getPersonnelCode();
    public function __construct()
    {
    }
    public static function createByForm(User $userObj)
    {
        $instance=new self();
        $instance->setOfficialableIdAttribute($userObj->id);
        $instance->setOfficialableTypeAttribute(get_class($userObj));
        return $instance;
    }
    //for method overriding
//

    public function setOfficialableIdAttribute($id)
    {
        $this->attributes['officialable_id']=$id;
    }
    public function setOfficialableTypeAttribute($type)
    {
        $this->attributes['officialable_type']=$type;
    }
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
        $official=Official::createByForm($userObj);
        $official->save();
        parent::create($official,$regData);

//        $attributes['userable_id']=$official->id;
//        $attributes['userable_type']=$official->type;
//        dd($attributes);
//        $user->create($attributes);
//        dd('sdfg');
    }
}

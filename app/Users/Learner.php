<?php
namespace App\Users;
use Illuminate\Database\Eloquent\Model as Model;

class Learner extends User
{

    public function __construct(object $userObj)
    {
        $this->setLearnerableIdAttribute($userObj->id);
        $this->setLearnerableTypeAttribute(get_class($userObj));

    }
    public function setLearnerableIdAttribute($id)
    {
        $this->attributes['learnerable_id']=$id;
    }
    public function setLearnerableTypeAttribute($type)
    {
        $this->attributes['learnerable_type']=$type;
    }
    protected $table='learners';
    //protected $fillable = [];
    public function user() //user be official
    {
        return $this->morphOne('App\Users\User','userable');
    }
    public function learnerable() //official be teacher
    {
        return $this->morphTo();
    }
    public function sessionPassStatus()
    {
        return $this->hasMany('App\Session\SessionPassStatus');
    }
//    public static function create($data)
//    {
//
//        parent::create($data);
//
//    }
    public static function create(object $userObj,array $regData)//$attributes hamoon sheyei az Teacher
    {
        $learner=new Learner($userObj);
        $learner->save();
        parent::create($learner,$regData);

//        $attributes['userable_id']=$official->id;
//        $attributes['userable_type']=$official->type;
//        dd($attributes);
//        $user->create($attributes);
//        dd('sdfg');
    }
}

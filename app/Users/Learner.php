<?php
namespace App\Users;
use App\QBank\LearnerAnswer;
use Illuminate\Database\Eloquent\Model as Model;
use App\Users\LearnerUser;

class Learner extends Model
{
    protected $table='learners';

    public function __construct()
    {

    }
    public static function createByForm(LearnerUser $userObj)
    {
        $instance=new self();
        $instance->setLearnerableIdAttribute($userObj->id);
        $instance->setLearnerableTypeAttribute(get_class($userObj));
        return $instance;
    }
    public function setLearnerableIdAttribute($id)
    {
        $this->attributes['learnerable_id']=$id;
    }
    public function setLearnerableTypeAttribute($type)
    {
        $this->attributes['learnerable_type']=$type;
    }
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

    public static function create(LearnerUser $userObj,array $regData)//$attributes hamoon sheyei az Teacher
    {
        $learner=Learner::createByForm($userObj);
        $learner->save();
        $userObj->learner()->save($learner);
        return User::create($learner,$regData);

    }
}

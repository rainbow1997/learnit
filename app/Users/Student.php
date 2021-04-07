<?php
namespace App\Users;
use Illuminate\Database\Eloquent\Model as Model;
use App\Users\LearnerUser;
class Student extends Model implements LearnerUser
{
    protected $table='students';

    public function setStudentalCodeAttributes()
    {
        $this->attributes['studental_code']=$this->setStudentalCode();
    }
    public function getStudentalCodeAttributes()
    {
        return $this->attributes['studental_code'];
    }
    public function __construct()
    {
         $this->setStudentalCodeAttribute();
    }
    public function homeworks()
    {
        return $this->belongsToMany('App\Homework\Homework');
    }
    public function learner()
    {
        return $this->morphOne(Learner::class,'learnerable');
    }
    public function user()
    {
       //return $this->hasManyThrough(User::class,Learner::class,null,'learnerable_id')->where('learnerable_type',User::class);
        return $this->learner->user();//ye rahe sadetar baraye hasManyThrough in Polymorphic ha
    }

    public static function create(LearnerUser $userObj,array $regData)
    {
        $userObj->save();
        return Learner::create($userObj,$regData);
    }
    //accessor get mutrator set
    public function setStudentalCodeAttribute()
    {
        $this->attributes['studental_code']=$this->setStudentalCode();

    }


    public static function getLocalValidation()
    {
        //this function passed to Register Controller

        $validationItem=[
            'studental_code'=>['required','digits:9']
        ];
        return $validationItem;


    }

    public static function getFillableItemKeys()
    {
//        //die('ingetItemKey'.var_dump(self::$teacherFillable));
//        if(isset(self::$teacherFillable))
//            return array_keys(self::$teacherFillable);
//        return FALSE;
    }
    public static function setLocaleFillable()
    {
        mergeSelfFillableToParent();
    }
    public static function getLocaleFillable()
    {
//        return
//            self::$teacherFillable;
    }


    protected function setStudentalCode()
    {
        return rand(139908078,1450000066);
    }


    public static function mergeSelfFillableToParent()
    {
//        return
//            array_merge(parent::$fillable,self::$teacherFillable);

    }
}

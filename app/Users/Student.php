<?php
namespace App\Users;
class Student extends Learner
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
    public static function create(object $userObj,array $regData)
    {
        $userObj->save();
        parent::create($userObj,$regData);

    }
    //accessor get mutrator set
    public function setStudentalCodeAttribute()
    {
        $this->attributes['studental_code']=$this->setStudentalCode();

    }


    //moshkel extendaro hal kon
    public function learner()
    {
        return $this->morphOne('App\Users\Learner','learnerable');
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

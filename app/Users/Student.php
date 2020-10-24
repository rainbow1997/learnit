<?php
namespace App\Users;
class Student extends Learner
{

    public function learner()
    {
         return $this->morphOne('App\Users\Learner','learnerable');
    }

    public static $learnerFillable=
    ['learnerCode'];

    public static function getLocalValidation()
    {
    //this function passed to Register Controller

        $validationItem=[
            'learnerCode'=>['required','digits:9']
        ];
        return $validationItem;


    }
    public function __construct()
    {
    }

    public static function setLocaleFillable()
    {
        mergeSelfFillableToParent();
    }
    public static function getLocaleFillable()
    {
        return
            self::$learnerFillable;
    }
    public static function getFillableItemKeys()
    {
        return array_keys(self::$learnerFillable);
    }

    public static function setLearnercode()
    {
        self::$learnerFillable['learnerCode']=substr(md5(microtime().rand()),9);
    }
    public static function getLearnercode()
    {
        return
         self::$leatearnerFillable['learnerCode'];
    }


    public static function mergeSelfFillableToParent()
    {
        return
            array_merge(parent::$fillable,self::$learnerFillable);

    }
}

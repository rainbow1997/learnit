<?php
namespace App\Users;
class Teacher extends Official
{
    public static $teacherFillable=
    ['personnelCode'];
    //moshkel extendaro hal kon
    public function official()
    {
        return $this->morphOne('App\Users\Official','officialable');
    }

    public static function getLocalValidation()
    {
    //this function passed to Register Controller

        $validationItem=[
            'personnelCode'=>['required','digits:9']
        ];
        return $validationItem;


    }
    public static function getFillableItemKeys()
    {
        return array_keys(self::$teacherFillable);
    }
    public static function setLocaleFillable()
    {
        mergeSelfFillableToParent();
    }
    public static function getLocaleFillable()
    {
        return
            self::$teacherFillable;
    }


    public static function setPersonnelCode()
    {
        self::$teacherFillable['personnelCode']=substr(md5(microtime().rand()),6);
    }
    public static function getPersonnelCode()
    {
        return
            self::$teacherFillable['personnelCode'];
    }


    public static function mergeSelfFillableToParent()
    {
        return
            array_merge(parent::$fillable,self::$teacherFillable);

    }
}

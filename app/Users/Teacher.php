<?php
namespace App\Users;
use Illuminate\Database\Eloquent\Model as Model;

class Teacher extends Model
{
    protected $table='teachers';

    public function __construct()
    {

        $this->setPersonnelCodeAttribute();
    }
    public function setPersonnelCodeAttributes()
    {
        $this->attributes['personnel_code']=$this->setPersonnelCode();
    }
    public function getPersonnelCodeAttributes()
    {
        return $this->attributes['personnel_code'];
    }

//    public static function createByForm(User $userObj)
//    {
//        $instance=new self();
//        $instance->setPersonnelCodeAttribute();
//        return $instance;
//    }
    public static function create(object $userObj,array $regData)
    {
    $userObj->save();
        return Official::create($userObj,$regData);

    }
    //accessor get mutrator set
    public function setPersonnelCodeAttribute()
    {
       $this->attributes['personnel_code']=$this->setPersonnelCode();

    }


    //moshkel extendaro hal kon
    public function official()
    {
        return $this->morphOne('App\Users\Official','officialable');
    }
    public function teacher()
    {
        return $this->official->user();
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
        //die('ingetItemKey'.var_dump(self::$teacherFillable));
        if(isset(self::$teacherFillable))
          return array_keys(self::$teacherFillable);
        return FALSE;
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


    protected function setPersonnelCode()
    {
      return rand(13990807,14500000);
    }


    public static function mergeSelfFillableToParent()
    {
        return
            array_merge(parent::$fillable,self::$teacherFillable);

    }
}

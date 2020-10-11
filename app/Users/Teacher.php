<?php
namespace App\Users;
class Teacher extends User implements Official
{
    protected $_table='teacher_o_u';
    protected $guard='teacher';
    private $teacherFillable=
    ['personnelCode'];


    public static function getLocalValidation()
    {
    //this function passed to Register Controller

        $validationItem=[
            'personnelCode'=>['required','digits:9']
        ];
        return $validationItem;


    }
    public function getFillableItemKeys()
    {
        return array_keys($this->$teacherFillable);
    }
    public function setLocaleFillable()
    {
        mergeSelfFillableToParent();
    }
    public function getLocaleFillable()
    {
        return
            $this->teacherFillable;
    }


    public function setPersonnelCode()
    {
        $this->teacherFillable['personnelCode']=substr(md5(microtime().rand()),6);
    }
    public function getPersonnelCode()
    {
        return
          $this->teacherFillable['personnelCode'];
    }


    private function mergeSelfFillableToParent()
    {
        return
            array_merge(parent::$fillable,$this->teacherFillable);

    }
}

<?php
namespace Users;
class Teacher extends User implements Official,CentralInterface
{
    private $teacherFillable=
    ['personnelCode'];


    protected function getLocalValidation()
    {
    //this function passed to Register Controller
    
        $validationItem=[
            'personnelCode'=>['required','digits:9']
        ];
        return $validationItem;
      
     
    }
    protected function getFillableItemKeys()
    {
        return array_keys($this->$teacherFillable);
    }
    protected function setLocaleFillable()
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
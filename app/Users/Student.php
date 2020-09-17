<?php
namespace App\Users;
class Student extends User implements Learner,CentralInterface
{
    private $learnerFillable=
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

    protected function setLocaleFillable()
    {
        mergeSelfFillableToParent();
    }
    protected function getLocaleFillable()
    {
        return
            $this->learnerFillable;
    }
    public function getFillableItemKeys()
    {
        return array_keys($this->learnerFillable);
    }

    public function setLearnercode()
    {
        $this->learnerFillable['learnerCode']=substr(md5(microtime().rand()),9);
    }
    public function getLearnercode()
    {
        return
         $this->learnerFillable['learnerCode'];
    }

    
    private function mergeSelfFillableToParent()
    {
        return
            array_merge(parent::$fillable,$this->learnerFillable);

    }
}
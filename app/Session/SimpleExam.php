<?php


namespace App\Session;


use App\QBank\QBank;
use App\QBank\Question;

class SimpleExam extends Model
{
    protected $table='simple_exams';
//    public function


    public function output()
    {
        return $this->questions();
    }
    public function exam()
    {
        return $this->morphOne(Exam::class,'examable');
    }


}

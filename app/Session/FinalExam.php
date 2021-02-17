<?php


namespace App\Session;


class FinalExam extends Exam
{
    public function exam()
    {
        return $this->morphOne('App\Session\Exam');
    }

}

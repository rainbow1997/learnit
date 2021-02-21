<?php


namespace App\Session;


class FinalExam extends Exam
{
    protected $table='final_ex';
    public function exam()
    {
        return $this->morphOne('App\Session\Exam','examable');
    }

}

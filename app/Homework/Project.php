<?php
namespace App\Homework;
use App\Homework\HomeworkInterface;
use App\Session\Session;

class Project implements HomeworkInterface
{
    public function homework()
    {
        return $this->morphOne(Homework::class,'homeworkable');
    }

    public function getStatus()
    {
        // TODO: Implement getStatus() method.
    }

    public function output()
    {

    }
}

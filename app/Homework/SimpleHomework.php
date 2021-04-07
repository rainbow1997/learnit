<?php
namespace App\Homework;
use App\Session\Session;
use Illuminate\Database\Eloquent\Model as Model;
use App\Homework\HomeworkInterface;
class SimpleHomework extends Model implements HomeworkInterface
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

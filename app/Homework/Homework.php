<?php


namespace App\Homework;
use App\Session\Session;
use App\Users\User;
use Illuminate\Database\Eloquent\Model as Model;

class Homework extends Model
{
    public $fillable=['name','describe','start_dateTime','end_dateTime','status'];
    public $table='homeworks';
    public function homeworkable()
    {
        return $this->morphTo();
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
        //every homework has 2 part question and answer !
        //question is many to many but answer is 1 to 1
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    public function homeworkAnswers()
    {
        return $this->hasMany(HomeworkAnswer::class);
    }
}

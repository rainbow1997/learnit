<?php


namespace App\QBank;
use Illuminate\Database\Eloquent\Model as Model;


class QuestionOption extends Model
{
    protected $table="question_options";
    protected $fillable=[];
    public function question()
    {
        return $this->belongsTo('App\QBank\Question');
    }
    public function quesoptable()
    {
        return $this->morphTo('quesoptable');
    }
    public function getIsAnswer()
    {
        return $this->isAnswer;
    }
    public function output()
    {
        ;
    }
//    public function questionoptions()
//    {
//        return $this->hasMany('App\QBank\QuestionOption');
//    }
}

<?php


namespace App\QBank;
use Illuminate\Database\Eloquent\Model as Model;


class QuestionOption extends Model
{
    protected $table="question_options";

    public function question()
    {
        return $this->belongsTo('App\QBank\Question');
    }
    public function quesoptable()
    {
        return $this->morphTo(__FUNCTION__,'quesoptable_type','quesoptable_id');
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

<?php


namespace App\QBank;


class TextQuestionOption extends QuestionOption
{
    protected $table='text_ques_opt';

    protected $fillable=['option_text'];
    public function question()
    {
        return $this->morphOne('App\QBank\Question','questionable');
    }
    public function quesoptable()
    {
        return $this->morphOne('App\QBank\QuestionOption','quesoptable');
    }
    public function output()
    {
        return $this->text;
    }

}

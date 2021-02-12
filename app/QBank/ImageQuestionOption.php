<?php


namespace App\QBank;


class ImageQuestionOption extends QuestionOption
{
    protected $table='image_ques_opt';

    public function attachment()
    {
        return $this->belongsTo('App\Attachment\Attachment');
    }
    public function quesopt() //hamoon questionoptions()
    {
        return $this->morphOne('App\QBank\QuestionOption','quesoptable');
    }
    public function output()
    {
        return $this->attachment();
    }
}

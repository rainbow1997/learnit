<?php


namespace App\QBank;
use Illuminate\Database\Eloquent\Model as Model;


class PdfQuestionOption extends Model
{
    protected $table='pdf_ques_opt';

    public function question()
    {
        return $this->morphOne('\App\QBank\Question','questionable');
    }
    public function quesoptable()
    {
        $this->morphOne('App\QBank\QuestionOption','quesoptable');
    }
    public function attachment()
    {
        return $this->belongsTo('App\Attachment\Attachment');
    }
    public function output()
    {
        return $this->attachment();
    }
}

<?php


namespace App\QBank;


class PdfQuestion extends Question
{
    protected $table='pdf_question';
    public function question()
    {
        return $this->morphOne('App\QBank\Question','questionable');

    }
    public function attachment()
    {
        return $this->belongsTo('App\Attachment\Attachment');
    }
    public function questionoptions()
    {
        return $this->morphOne('App\QBank\QuestionOption');
    }
    public function output()
    {
        // return $this;
        return $this->attachment();
    }

}

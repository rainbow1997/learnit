<?php
namespace App\QBank;
use Illuminate\Database\Eloquent\Model as Model;


class PdfQuestion extends Model
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

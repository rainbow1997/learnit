<?php


namespace App\QBank;
use Illuminate\Database\Eloquent\Model as Model;


class TextQuestion extends Model
{
    protected $table='text_question';
    protected $fillable=['question_text'];
    public function question()
    {
        return $this->morphOne('App\QBank\Question','questionable');
    }
    public function output()
    {
        return $this->question_text;
    }

}

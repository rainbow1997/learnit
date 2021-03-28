<?php


namespace App\QBank;

use Illuminate\Database\Eloquent\Model as Model;

class TextQuestionOption extends Model
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
        return $this->option_text;
    }

}

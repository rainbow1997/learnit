<?php


namespace App\QBank;

use Illuminate\Database\Eloquent\Model as Model;

class ImageQuestionOption extends Model
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

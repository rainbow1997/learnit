<?php


namespace App\QBank;

use Illuminate\Database\Eloquent\Model as Model;

class Question extends Model
{
    protected $table="questions";
    public function output()
    {
    }
    public function qbank()
    {
        return $this->belongsTo('App\QBank\QBank');
    }
    public function questionable()
    {
        return $this->morphTo();
    }
    public function questionoptions()
    {
        return $this->hasMany('App\QBank\QuestionOption');
    }

    public function answer()
    {
        return $this->hasOne('\App\QBank\QuestionOption')->withDefault([
            'isAnswer'=>TRUE,
        ]);
    }
}

<?php


namespace App\Session;

class Exam extends Session
{
    protected $fillable=['total_score','approval_score','status'];
    public function examable()
    {
        return $this->morphTo();
    }
    public function session()
    {
        return $this->morphOne('App\Session\Session');
    }
    public function lesson()
    {
        return $this->belongsTo('App\Lesson','lesson_id');
    }
    public function qbank()
    {
        return $this->belongsTo('App\Lesson','qbank_id');
    }
    //jadvala o migration ha moonde
}

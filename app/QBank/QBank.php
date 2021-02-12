<?php


namespace App\QBank;
use Illuminate\Database\Eloquent\Model as Model;


class QBank extends Model
{
    protected $table="qbanks";
    protected $fillable=['status','describe'];
    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
    public function questions()
    {
        return $this->hasMany('App\QBank\Question','qbank_id');
    }
}

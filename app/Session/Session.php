<?php


namespace App\Session;
use Illuminate\Database\Eloquent\Model as Model;


class Session extends Model
{
    protected $fillable=['name','describe','sort_number']; //bayad virayesh beshe


    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
    public function sessionable()
    {
        return $this->morphTo();
    }
    public function attachments()
    {
        return $this->belongsToMany('App\Attachment\Attachment');//chand be chand
    }
    public function output()
    {
       return $this->attachments();
    }

}

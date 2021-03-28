<?php


namespace App\QBank;
use Illuminate\Database\Eloquent\Model as Model;


class ImageQuestion extends Model
{
    protected $table='image_question';

    public function question()
    {
        return $this->morphOne('App\QBank\Question','questionable');
    }
    public function attachment()
    {
       return  $this->belongsTo('App\Attachment\Attachment');
    }
    public function output()
    {
       // return $this;
       return $this->attachment();
    }

}

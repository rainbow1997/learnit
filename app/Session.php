<?php


namespace App;
use Illuminate\Database\Eloquent\Model as Model;


class Session extends Model
{
    protected $fillable=['ip_address','user_agent','payload','last_activity'];

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
    public function qbanks()
    {
        return $this->hasMany('App\QBank\QBank');
    }

}

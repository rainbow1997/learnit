<?php


namespace App\Session;
use Illuminate\Database\Eloquent\Model as Model;


class SessionPassStatus extends Model
{
    protected $table='pass_status';
    public function user()
    {
        return $this->belongsTo('App\Users\User');
    }
    public function session()
    {
        return $this->belongsToMany('App\Session\Session');
    }
    public function passed()
    {
        return $this->passed;
    }
}
//onPassStatus bayad arg begire

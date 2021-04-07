<?php


namespace App\Homework;
use App\Session\Session;
use App\Users\User;
use Illuminate\Database\Eloquent\Model as Model;

class Homework extends Model
{
    public $fillable=['name','describe','start_dateTime','end_dateTime','status'];
    public $table='homeworks';
    public function homeworkable()
    {
        return $this->morphTo();
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function session()
    {
        return $this->morphOne(Session::class,'sessionable');
    }
}

<?php


namespace App;
use Illuminate\Database\Eloquent\Model as Model;


class Lesson extends Model
{
protected $fillable=['name','registration_capacity','units','pay_per_unit','status'];
public function term()
{
    return $this->belongsTo('\App\Term');
}
public function sessions()
{
    return $this->hasMany('\App\Session');
}
public function qbanks()
{
    return $this->hasMany('\App\QBank\QBank');
}
}

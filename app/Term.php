<?php
namespace App;
use Illuminate\Database\Eloquent\Model as Model;


class Term extends Model
{

protected $fillable=['term_start_date','term_end_date','status'];

public function toggleStatus()
{
    $this->fillable['status']=!$this->fillable;
}
public function lessons()
{
    return $this->hasMany('App\Lesson');
}
public function changeTermDate($start,$end)
{
    $this->fillable['term_start_date']=$start;
    $this->fillable['term_end_date']=$end;
}

}

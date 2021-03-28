<?php


namespace App\Session;

use Illuminate\Database\Eloquent\Model as Model;

class FinalExam extends Model
{
    protected $table='final_ex';
    public function exam()
    {
        return $this->morphOne('App\Session\Exam','examable');
    }

}

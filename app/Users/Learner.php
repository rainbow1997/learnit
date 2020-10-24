<?php
namespace App\Users;
use Illuminate\Database\Eloquent\Model as Model;

class Learner extends User
{
    //public function setLearnerCode();
    //public function getLearnerCode();
    protected $fillable = [];

    public function user()
    {
        return $this->morphOne('App\Users\User','userable');
    }
    public function learnerable()
    {
        return $this->morphTo();
    }
}

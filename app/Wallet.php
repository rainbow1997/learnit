<?php


namespace App;
use Illuminate\Database\Eloquent\Model as Model;
use App\Users\User as User;

/*
 soal inast ke chera public userObj chera protected nmishe va asln in ravash baraye kar ba ashya doroste
 */
class Wallet extends Model
{
    protected $attributes=['balance'];
    public object $user;
   // protected $fillable = ['status','balance'];

    public function __construct(object $userObj)
    {
        $this->user= &$userObj;
    }

    public function user()
    {
        return $this->belongsTo($this->user);
    }
    public function deposit($money)//deposit
    {

        $this->attributes['balance']=$money;
    }
    public function withdraw($money)//bardasht
    {
        $this->attributes['balance'] -= $money;
    }
    public function getBalanceAttribute()
    {
        return $this->attributes['balance'];
    }

}

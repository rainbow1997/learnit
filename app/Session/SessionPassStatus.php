<?php


namespace App\Session;
use App\Users\User as User;
use Illuminate\Database\Eloquent\Model as Model;


class SessionPassStatus extends Model
{
    protected $table="pass_status";
    //protected $fillable=['session_id','exam_id','passed','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public static function createForConfirm(User $user,Session $session,Exam $exam,bool $passed)
    {
        $instance=new self();
        $instance->user()->associate($user);
        $instance->session()->associate($session);
        $instance->exam()->associate($exam);
        $instance->passed=$passed;
        return $instance;
    }
    public function isPassed()
    {
            return $this->passed;
    }
}
//onPassStatus bayad arg begire

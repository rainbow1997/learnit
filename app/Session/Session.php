<?php
namespace App\Session;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth as Auth;
use App\Session\SessionPassStatus;
class Session extends Model
{
    use SoftDeletes;
    protected $fillable=['name','describe','sort_number','full_text']; //bayad virayesh beshe
    protected $dates = ['deleted_at'];

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
    public function sessionable()
    {
        return $this->morphTo();
    }
    public function attachments()
    {
        return $this->belongsToMany('App\Attachment\Attachment');//chand be chand
    }
    public function output()// to sayer class ahye farzand override beshe hatmn
    {
        if($this->sort_number>1 &&  $this->passChecking()!=TRUE)
            abort(500,'You can\'t continue because you have to pass last session exam');
       return $this->full_text;
    }
    public function passChecking()
    {
        //ba session id jalase hadaf miad tooye jdvl pass_status
        //query mizane agar peyda kard khob pass esho check mikone
        //agar relationi ba record session_id hadaf nabood
        //ya agar bood ama passed=0 yani mojaz be moshahede on jalase nis
        return ( ($this->hasOne(SessionPassStatus::class)->count() )?$this->hasOne(SessionPassStatus::class):FALSE);
    }
    public function exam()
    {
        return $this->hasOne('App\Session\Exam');
    }
    public function homeworks()
    {
        return $this->hasMany('App\Homework\Homework');
    }
    public function creator()
    {
        return $this->belongsTo('App\Users\User');
    }
}

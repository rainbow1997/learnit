<?php


namespace App;
use App\Session\Session;
use App\Users\User;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lesson extends Model
{
    use SoftDeletes;
    protected $fillable=['name','registration_capacity','units','pay_per_unit','status','term_id','creator_id'];
    protected $table="lessons";
    protected $dates = ['deleted_at'];
    public function term()
    {
        return $this->belongsTo('\App\Term');
    }
    public function sessions()
    {
        return $this->hasMany('\App\Session\Session');
    }
    public function qbanks()
    {
        return $this->hasMany('\App\QBank\QBank');
    }
    public function exams()
    {
        return $this->hasMany('App\Session\Exam');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'users_lessons_tbl');
    }

}

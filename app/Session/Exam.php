<?php


namespace App\Session;

use App\QBank\LearnerAnswer;
use App\QBank\Question;
use App\Users\Learner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Exam extends Session
{
    protected $table = 'exams';
    protected $fillable = ['total_score', 'approval_score', 'status'];
    public $sessionPassStatus;

    public function __construct()
    {
        $this->checkScoresMatching();
    }
    public function learnerAnswers()
    {
         return $this->hasMany('App\QBank\LearnerAnswer');
    }
    protected function calculateExamScore()
    {
         $sumOfScore=0;
        foreach($this->learnerAnswers as $answer)
            ($answer->is_true)?$sumOfScore+=$answer->question->score:0;
        return $sumOfScore;
    }
    public function registerExam()
    {
        $passed=$this->hasPassBeforeConfirm($this->calculateExamScore());
        $this->sessionPassStatus=SessionPassStatus::createForConfirm(Auth::user(),$this->session,$this,$passed);
        return $this->sessionPassStatus->save();
    }
    protected function hasPassBeforeConfirm($sum) //when user confirm his exam answers
    {
        return ($sum >=$this->approval_score)?TRUE:FALSE;

    }
    public function score()
    {
        $questions=DB::table('learner_answer')->where('is_true','=',TRUE)->where('exam_id','=',$this->id)->pluck('question_id');
        return $this->questions()->whereIn('id',$questions)->sum('score');
        //felan faghat ba object parent mide able() faal beshe chon idish az 2 1 mishe nmishe
    }
    public function examable()
    {
        return $this->morphTo();
    }
    public function questions()
    {
        return Question::where('qbank_id',$this->qbank_id)->get();
    }
    public function session()
    {
        return $this->morphOne(Session::class,'sessionable');
    }
    public function lesson()
    {
        return $this->belongsTo('App\Lesson','lesson_id');
    }
    public function qbank()
    {
        return $this->belongsTo('App\QBank\QBank','qbank_id');
    }
    public function passed()
    {
        dd('inja');
        return $this->hasOne(SessionPassStatus::class);
    }
    public function isPassed()
    {
        return $this->sessionPassStatus=$this->belongsTo(SessionPassStatus::class);

    }
    public function checkScoresMatching()
    {
        if ($this->questions()->sum('score') > $this->total_score ||
            $this->questions()->sum('score') < $this->approval_score)
        {
            abort(417,'Sum of your scores is lower/higher than approval/total score');
        }
    }
    public function output()
    {
     return $this->attachments();
    }
    //jadvala o migration ha moonde
}

<?php
namespace App\QBank;
use App\Session\Exam;
use App\Users\User;
use Illuminate\Database\Eloquent\Model as Model;

class LearnerAnswer extends Model
{
    public $table='learner_answer';
    public $incrementing = true;
    public $fillable=['user_id','question_id','quesopt_id','exam_id','is_true'];//is true for database optimization
    //for construct overriding
    public static function createForLearnerAnswers(User $user,Question $question,QuestionOption $quesopt,Exam $exam)
    {
        $instance=new self;
        $instance->user()->associate($user);
        $instance->question()->associate($question);
        $instance->quesopt()->associate($quesopt);
        $instance->exam()->associate($exam);
        $instance->is_true=$instance->quesopt->isAnswer;
    }

    public function user()
    {//1to1
        return $this->belongsTo('App\Users\User','user_id');
    }
    public function exam()
    { //1to1
        return $this->belongsTo('App\Session\Exam','exam_id');
    }
    public function question()
    { //1to1
        return $this->belongsTo(Question::class);
    }
    public function quesopt()
    { //1to1
        return $this->belongsTo(QuestionOption::class);
    }

}

<?php

namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Lesson;
use App\Term;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $terms;
    public function __construct()
    {
        $this->middleware('auth');//badan az middleware controllesh kon
        $this->setTerms();
    }
    private function setTerms()
    {
        $this->terms = Term::get(['title','id']);
        return TRUE;
    }
    public function index()
    {
        //
        $lessons=Lesson::paginate(5);
        return view('lesson.lesson_management',['lessons'=>$lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('lesson.lesson_create',['terms'=>$this->terms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated=$request->validate(
            [
                'name'=>'required|max:150',
                'term_id'=>'alpha_num|required|exists:terms,id',
                'registration_capacity'=>'alpha_num|required',
                'units'=>'alpha_num|required',
                'pay_per_unit'=>'alpha_num|required',
                'status'=>'required|boolean'
            ]
        );
        $validated['creator_id'] = Auth::id();
        $lesson=new Lesson($validated);
        $lesson->save();
        Session::flash('message','درس مورد نظر با موفقیت افزوده شد.');
        return redirect()->action([LessonController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
        $terms=Term::get(['title','id']);
        return view('lesson.lesson_show',['lesson'=>$lesson,'terms'=>$this->terms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //

        return view('lesson.lesson_edit',['lesson'=>$lesson,'terms'=>$this->terms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
        $validated=$request->validate(
            [
                'name'=>'required|max:150',
                'term_id'=>'alpha_num|required|exists:terms,id',
                'registration_capacity'=>'alpha_num|required',
                'units'=>'alpha_num|required',
                'pay_per_unit'=>'alpha_num|required',
                'status'=>'required|boolean'
            ]
        );
        $lesson->update($validated);
        Session::flash('message','درس مورد نظر با موفقیت بروزرسانی شد.');
        return redirect()->action([LessonController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)//az view id miad ama khode laravel
        // tashkhis mide o inject mikone lessone marbootero
    {
        //
        $lesson->delete();
        return redirect()->action([LessonController::class,'index'])->with('success','درس مورد نظر با موفقیت حذف شد.');
    }
}

<?php

namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Lesson;
use App\Term;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');//badan az middleware controllesh kon
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
        $terms=Term::get(['title','id']);
        return view('lesson.lesson_create',['terms'=>$terms]);
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
        $lesson=new Lesson($validated);
        $lesson->save();
        Session::flash('message','درس مورد نظر با موفقیت افزوده شد.');
        return redirect()->action([LessonController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $terms=Term::get(['title','id']);
        $lesson=Lesson::find($id);//badan findorfaile
        return view('lesson.lesson_show',['lesson'=>$lesson,'terms'=>$terms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $terms=Term::get(['title','id']);
       // dd($terms);
        $lesson=Lesson::find($id);//badan findorfaile
        return view('lesson.lesson_edit',['lesson'=>$lesson,'terms'=>$terms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $lesson=Lesson::find($id);
        $lesson->update($request->all());
        Session::flash('message','درس مورد نظر با موفقیت بروزرسانی شد.');
        return redirect()->action([LessonController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//az view id miad ama khode laravel
        // tashkhis mide o inject mikone lessone marbootero
    {
        //
        Lesson::find($id)->delete();
        return redirect()->action([LessonController::class,'index'])->with('success','درس مورد نظر با موفقیت حذف شد.');
    }
}

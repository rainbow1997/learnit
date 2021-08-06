<?php

namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Lesson;
use App\Session\Session;
use DB;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $typesOfSessions;
    protected $sessions;
    public function __construct(Session $sessions)
    {
        $this->middleware('auth');//badan az middleware controllesh kon
        $this->sessions=$sessions;
        $this->typesOfSessions=['Session','Exam','FinalExam','SimpleExam'];

    }

    public function index()
    {

       $sessions=$this->sessions::paginate(15);
        return view('session.session_management',['sessions'=>$sessions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $terms=Auth::user()->terms;
        return view('session.session_create',['typesOfSessions'=>$this->typesOfSessions,'terms'=>$terms]);
    }
    public function lessonsOfTerm(Request $request)
    {
        $term_id=$this->validateForLessonsOfTermFunction($request);
        $lessons=Lesson::where('term_id','=',$term_id)
                              ->where('creator_id','=',Auth::id())->get();
        $newLessons=[];
        foreach($lessons as $lesson)
        {
            $newLessons='<option value=\"'.$lesson['id'].'\">'.$lesson['name'].'</option>';
        }

        return response()->json(['lessons'=>$newLessons],200);
    }
    public function validateForLessonsOfTermFunction(Request $data)
    {
        $validated=$data->validate([
            'term_id'=>'required|alpha_num|exists:terms,id'
        ]);
        return $validated;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

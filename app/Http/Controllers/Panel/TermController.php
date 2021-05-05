<?php

namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;
use DB;

use App\Policies\TermPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Term as Term;
//felan sath dastresio bikhial ta CRUD ha takmil she
class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('role_or_permission:modirkol|term-index');

    }

    public function index()
    {
        //
        $terms=Term::paginate(5);//khodesh kollo 15 taei mide
        return view('term.term_management',['terms'=>$terms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('term.term_create');
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
                'title'=>'required|unique:terms|max:150',
                'term_start_date'=>'required|date',
                'term_end_date'=>'required|date',
                'status'=>'required|boolean'

            ]
        );
        $term=new Term($validated);
        $term->save();
        Session::flash('message','ترم جدید، توسط شما با موفقیت به ثبت رسید.');
        return redirect()->action([TermController::class,'index'])  ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $term=Term::find($id);
        return view('term.term_show',['term'=>$term]);
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
        $term=Term::find($id);
        return view('term.term_edit',['term'=>$term]);
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
                'title'=>'required|max:150',
                'term_start_date'=>'required|date',
                'term_end_date'=>'required|date',
                'status'=>'required|boolean'

            ]
        );
        $term=Term::find($id);
        $term->update($request->all());
        Session::flash('message','ترم مورد نظر شما با موفقیت بروزرسانی شد.');
        return redirect()->action([TermController::class,'index']);

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
        DB::table("terms")->where('id',$id)->delete();
        Session::flash('message','ترم مورد نظر شما با موفقیت حذف شد.');
        return redirect()->action([TermController::class,'index']);
    }
}

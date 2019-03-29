<?php

namespace App\Http\Controllers\admin;

use App\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    // public $answer = null;
    public function index(Request $request)
    { 
        // $exam=\App\Exam::paginate(5);
        return view('admin.exams', compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('answer.registerAnswer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'answer_name' =>'required|max:100',
        // ]);

        // $answer = new Answer();
        // $answer->answer_name = $request['answer_name'];
        
        // if($answer->save()){
        //     return redirect('admin/answers')->with('success','Registered answer successfully');
        // }else{
        //     return redirect('admin/answers')->withInput($request->only('answer_name'));
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $answer = Answer::find($id);
        // return view('admin.viewAnswer', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $answer = Answer::find($id);
        // return view('admin.editAnswer', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        // $answer->fill($request->all());
        // if($answer->save()){
        //     return redirect('admin/answers')->with("success","Actualizado correctamente");
        // }
        // return redirect('admin/answers')->with("error","ther was an error");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // if(Answer::destroy($id)){
        //     return redirect('admin/answers')->with("success","Eliminado correctamente");
        // } else {
        //     return redirect('admin/answers')->with("error","ther was an error");
        // }
    }
}

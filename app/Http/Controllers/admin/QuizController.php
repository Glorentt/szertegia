<?php

namespace App\Http\Controllers\admin;

use App\Question;
use Illuminate\Http\Request; // use App\Http\Requests\StoreQuestionRequest;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public $question = null;
    public function index(Request $request)
    { 
        $questions=\App\Question::paginate(5);
        return view('admin.questions', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('question.create');
        return view('question.registerQuestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_name' =>'required|max:100',
        ]);

        $question = new Question();
        $question->question_name = $request['question_name'];
        
        if($question->save()){
            return redirect('admin/questions')->with('success','Registered question successfully');
        }else{
            return redirect('admin/questions')->withInput($request->only('question_name'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('admin.viewQuestion', compact('question'));
        // $request->validate([
        //     'question_name' =>'required|max:150',
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('admin.editQuestion', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->fill($request->all());
        if($question->save()){
            return redirect('admin/questions')->with("success","Actualizado correctamente");
        }
        return redirect('admin/questions')->with("error","ther was an error");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Question::destroy($id)) {
            return redirect('admin/questions')->with('success', 'Eliminado correctamente');
        } else {
            return redirect('admin/questions')->with('error', 'ther was an error');
        }
    }
}

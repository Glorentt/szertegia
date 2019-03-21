<?php

namespace App\Http\Controllers\admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionRequest;
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
        return view('question.create');
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
    public function show(Request $request, $id)
    {
        $request->validate([
            'question_name' =>'required|max:150',
        ]);
        
        $questions = Question::find($id);
        $questions->question_name = $request['question_name'];
        $questions->user_id = $request['user_id'];
        $questions->exam_id = $request['exam_id'];
        $questions->updated_at = $request['updated_at'];

        if($questions->save()){
            return redirect('admin/questions')->with("success","Actualizado correctamente");
        }
        return redirect('admin/questions')->with("error","ther was an error");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::findorFail($id);
        $quest =$questions->toArray();
        echo $quest['id'].",";
        echo $quest['question_name'].",";
        echo $quest['user_id'].",";
        echo $quest['exam_id'].",";
        echo $quest['created_at'].",";
        echo $quest['updated_at'];
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
        echo "method update";
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

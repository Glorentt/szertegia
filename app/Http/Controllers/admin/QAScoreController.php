<?php

namespace App\Http\Controllers\admin;

use App\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public $score = null;
    public function index(Request $request)
    { 
        $scores=\App\Score::paginate(5);
        return view('admin.scores', compact('scores'));
    }

    /**
     * Show the score for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('score.create');
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
            'form_id' =>'required|max:3',
            'question_id' =>'required|max:3',
            'score' =>'required|max:3',
            'acknowledge' =>'required|max:1'
        ]);

        $score = new Score();
        $score->form_id = $request['form_id'];
        $score->question_id = $request['question_id'];
        $score->score = $request['score'];
        $score->user_id = $request['user_id'];
        $score->acknowledge = $request['acknowledge'];
        
        if($score->save()){
            return redirect('admin/scores')->with('success','Registered score successfully');
        }else{
            return redirect('admin/scores')->withInput($request->only('form_name'));
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
            'form_id' =>'required|max:3',
            'question_id' =>'required|max:3',
            'score' =>'required|max:3',
            'acknowledge' =>'required|max:1'
        ]);
        
        $scores = Score::find($id);
        $scores->form_id = $request['form_id'];
        $scores->question_id = $request['question_id'];
        $scores->score = $request['score'];
        $scores->user_id = $request['user_id'];
        $scores->acknowledge = $request['acknowledge'];
        $scores->updated_at = $request['updated_at'];

        if($scores->save()){
            return redirect('admin/scores')->with("success","Actualizado correctamente");
        }
        return redirect('admin/scores')->with("error","ther was an error");
    }

    /**
     * Show the score for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scores = Score::findorFail($id);
        $quest =$scores->toArray();
        echo $quest['id'].",";
        echo $quest['form_id'].",";
        echo $quest['question_id'].",";
        echo $quest['score'].",";
        echo $quest['user_id'].",";
        echo $quest['acknowledge'].",";
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
        if(Score::destroy($id)) {
            return redirect('admin/scores')->with('success', 'Eliminado correctamente');
        } else {
            return redirect('admin/scores')->with('error', 'ther was an error');
        }
    }
}

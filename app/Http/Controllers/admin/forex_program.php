<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forex;
use DB;
use App\User;
class forex_program extends Controller
{
    public $forex= null;
    public $sale = null;

    public function showForm(){
        return view('admin.qa_forex_form');
    }

    public function store(Request $request){
        $forex = new Forex();
        $request->validate([
            'Q1'=>'required',
            'Q2'=>'required',
            'Q3'=>'required',
            'Q4'=>'required',
            'Q5'=>'required',
            'Q6'=>'required',
            'Q7'=>'required',
            'Q8'=>'required',
            'Q9'=>'required',
            'Q10'=>'required',
            // 'Q11'=>'required',
            // 'Q12'=>'required',
            // 'Q13'=>'required',
            // 'Q14'=>'required',
            // 'Q15'=>'required',
            // 'Q16'=>'required',
            // 'Q17'=>'required',
            // 'Q18'=>'required',
            // 'Q19'=>'required',
            // 'Q20'=>'required',
            // 'C1'=>'max:189',
            // 'C2'=>'max:189',
            // 'C3'=>'max:189',
            // 'C4'=>'max:189',
            // 'C5'=>'max:189',
            // 'C6'=>'max:189',
            // 'C7'=>'max:189',
            // 'C8'=>'max:189',
            // 'C9'=>'max:189',
            // 'C10'=>'max:189',
            // 'C11'=>'max:189',
            // 'C12'=>'max:189',
            // 'C13'=>'max:189',
            // 'C14'=>'max:189',
            // 'C15'=>'max:189',
            // 'C16'=>'max:189',
            // 'C17'=>'max:189',
            // 'C18'=>'max:189',
            // 'C19'=>'max:189',
            // 'C20'=>'max:189',
            'finalScore'=>'numeric',
            'finalComment'=>'required',
        ]);
        $forex->Q1 = $request->Q1;
        $forex->Q2 = $request->Q2;
        $forex->Q3 = $request->Q3;
        $forex->Q4 = $request->Q4;
        $forex->Q5 = $request->Q5;
        $forex->Q6 = $request->Q6;
        $forex->Q7 = $request->Q7;
        $forex->Q8 = $request->Q8;
        $forex->Q9 = $request->Q9;
        $forex->Q10 = $request->Q10;
        // $forex->Q11 = $request->Q11;
        // $forex->Q12 = $request->Q12;
        // $forex->Q13 = $request->Q13;
        // $forex->Q14 = $request->Q14;
        // $forex->Q15 = $request->Q15;
        // $forex->Q16 = $request->Q16;
        // $forex->Q17 = $request->Q17;
        // $forex->Q18 = $request->Q18;
        // $forex->Q19 = $request->Q19;
        // $forex->Q20 = $request->Q20;

        // $forex->C1 = $request->C1;
        // $forex->C2 = $request->C2;
        // $forex->C3 = $request->C3;
        // $forex->C4 = $request->C4;
        // $forex->C5 = $request->C5;
        // $forex->C6 = $request->C6;
        // $forex->C7 = $request->C7;
        // $forex->C8 = $request->C8;
        // $forex->C9 = $request->C9;
        // $forex->C10 = $request->C10;
        // $forex->C11 = $request->C11;
        // $forex->C12 = $request->C12;
        // $forex->C13 = $request->C13;
        // $forex->C14 = $request->C14;
        // $forex->C15 = $request->C15;
        // $forex->C16 = $request->C16;
        // $forex->C17 = $request->C17;
        // $forex->C18 = $request->C18;
        // $forex->C19 = $request->C19;
        // $forex->C20 = $request->C20;
        $forex->score= $request->finalScore;
        $forex->QA_id = $request->QA_id;
        $forex->user_id= $request->agentID;
        $forex->audio = $request->audio;
        $forex->final_comment = $request->finalComment;
        $forex->phone = $request->phone;
        if($forex->save()){
            return redirect('admin/qa-forex-form')->with('success','Qualify stored successfully');
        }else{
            return redirect('admin/qa-forex-form')->withInput($request->only('C1','C2','C3','C4','C5','C6','finalComment'));
        }
 
    }
}
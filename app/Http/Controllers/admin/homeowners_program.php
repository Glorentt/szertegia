<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Homeowners;
use DB;
use App\User;
class homeowners_program extends Controller
{
    public $homeowners= null;
    public $sale = null;

    public function showForm(){
        return view('admin.qa_homeowners_form');
    }

    public function store(Request $request){
        $homeowners = new Homeowners();
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
        $homeowners->Q1 = $request->Q1;
        $homeowners->Q2 = $request->Q2;
        $homeowners->Q3 = $request->Q3;
        $homeowners->Q4 = $request->Q4;
        $homeowners->Q5 = $request->Q5;
        $homeowners->Q6 = $request->Q6;
        $homeowners->Q7 = $request->Q7;
        $homeowners->Q8 = $request->Q8;
        $homeowners->Q9 = $request->Q9;
        $homeowners->Q10 = $request->Q10;
        // $homeowners->Q11 = $request->Q11;
        // $homeowners->Q12 = $request->Q12;
        // $homeowners->Q13 = $request->Q13;
        // $homeowners->Q14 = $request->Q14;
        // $homeowners->Q15 = $request->Q15;
        // $homeowners->Q16 = $request->Q16;
        // $homeowners->Q17 = $request->Q17;
        // $homeowners->Q18 = $request->Q18;
        // $homeowners->Q19 = $request->Q19;
        // $homeowners->Q20 = $request->Q20;

        // $homeowners->C1 = $request->C1;
        // $homeowners->C2 = $request->C2;
        // $homeowners->C3 = $request->C3;
        // $homeowners->C4 = $request->C4;
        // $homeowners->C5 = $request->C5;
        // $homeowners->C6 = $request->C6;
        // $homeowners->C7 = $request->C7;
        // $homeowners->C8 = $request->C8;
        // $homeowners->C9 = $request->C9;
        // $homeowners->C10 = $request->C10;
        // $homeowners->C11 = $request->C11;
        // $homeowners->C12 = $request->C12;
        // $homeowners->C13 = $request->C13;
        // $homeowners->C14 = $request->C14;
        // $homeowners->C15 = $request->C15;
        // $homeowners->C16 = $request->C16;
        // $homeowners->C17 = $request->C17;
        // $homeowners->C18 = $request->C18;
        // $homeowners->C19 = $request->C19;
        // $homeowners->C20 = $request->C20;
        $homeowners->score= $request->finalScore;
        $homeowners->QA_id = $request->QA_id;
        $homeowners->user_id= $request->agentID;
        $homeowners->audio = $request->audio;
        $homeowners->final_comment = $request->finalComment;
        $homeowners->phone = $request->phone;
        if($homeowners->save()){
            return redirect('admin/qa-homeowners-form')->with('success','Qualify stored successfully');
        }else{
            return redirect('admin/qa-homeowners-form')->withInput($request->only('C1','C2','C3','C4','C5','C6','finalComment'));
        }
 
    }
}
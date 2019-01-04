<?php

namespace App\Http\Controllers\admin;
use App\Casemanager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseManagerController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin.form_case_manager');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {

  }


  public function getComments($id){
      $comments = aftha_quality::select(array('C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','final_comment','phone','audio','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11'))
      ->where('id',$id)->get();
      foreach ($comments as $key => $value) {
          echo $value['phone'].'=>';
          echo $value['audio'].'=>';
          echo $value['C1'].'=>';
          echo $value['C2'].'=>';
          echo $value['C3'].'=>';
          echo $value['C4'].'=>';
          echo $value['C5'].'=>';
          echo $value['C6'].'=>';
          echo $value['C7'].'=>';
          echo $value['C8'].'=>';
          echo $value['C9'].'=>';
          echo $value['C10'].'=>';
          echo $value['C11'].'=>';
          echo $value['final_comment'].'=>';
          $a=1;
          do {
              echo $value['Q'.$a].'=>';
                  $a++;
          } while ($a <= 11);
      }
    }
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $aftha = new Casemanager();
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
      'Q11'=>'required',
      'Q12'=>'required',
      'C1'=>'max:189',
      'C2'=>'max:189',
      'C3'=>'max:189',
      'C4'=>'max:189',
      'C5'=>'max:189',
      'C6'=>'max:189',
      'C7'=>'max:189',
      'C8'=>'max:189',
      'C9'=>'max:189',
      'C10'=>'max:189',
      'C11'=>'max:189',
      'C12'=>'max:189',
      'finalScore'=>'numeric',
      'finalComment'=>'required',
    ]);
    $aftha->Q1 = $request->Q1;
    $aftha->Q2 = $request->Q2;
    $aftha->Q3 = $request->Q3;
    $aftha->Q4 = $request->Q4;
    $aftha->Q5 = $request->Q5;
    $aftha->Q6 = $request->Q6;
    $aftha->Q7 = $request->Q7;
    $aftha->Q8 = $request->Q8;
    $aftha->Q9 = $request->Q9;
    $aftha->Q10 = $request->Q10;
    $aftha->Q11 = $request->Q11;
    $aftha->Q12 = $request->Q12;
    $aftha->Q13 = $request->Q13;
    $aftha->Q14 = $request->Q14;
    $aftha->Q15 = $request->Q15;
    $aftha->Q16 = $request->Q16;
    $aftha->Q17 = $request->Q17;
    $aftha->Q18 = $request->Q18;
    $aftha->Q19 = $request->Q19;
    $aftha->Q20 = $request->Q20;

    $aftha->C1 = $request->C1;
    $aftha->C2 = $request->C2;
    $aftha->C3 = $request->C3;
    $aftha->C4 = $request->C4;
    $aftha->C5 = $request->C5;
    $aftha->C6 = $request->C6;
    $aftha->C7 = $request->C7;
    $aftha->C8 = $request->C8;
    $aftha->C9 = $request->C9;
    $aftha->C10 = $request->C10;
    $aftha->C11 = $request->C11;
    $aftha->C12 = $request->C12;
    $aftha->C13 = $request->C13;
    $aftha->C14 = $request->C14;
    $aftha->C15 = $request->C15;
    $aftha->C16 = $request->C16;
    $aftha->C17 = $request->C17;
    $aftha->C18 = $request->C18;
    $aftha->C19 = $request->C19;
    $aftha->C20 = $request->C20;
    $aftha->score= $request->finalScore;
    $aftha->QA_id = $request->QA_id;
    $aftha->user_id= $request->agentID;
    $aftha->audio = $request->audio;
    $aftha->final_comment = $request->finalComment;
    $aftha->phone = $request->phone;
    if($aftha->save()){
      return redirect('admin/casemanager')->with('success','Qualify stored successfully');
    }else{
      return redirect('admin/casemanager')->withInput($request->only('C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','C12','finalComment'));
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

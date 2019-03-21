<?php

namespace App\Http\Controllers\admin;
use App\Forex;
// use App\Casemanager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForexController extends Controller {
    /**
       * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function index() {
      return view('admin.qa_forex_form');
    }
      
    /**
       * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create() {
      //
    }

    /**
       * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
      // $forex = new Casemanager();
      $forex = new Forex();

      // $request->validate([
      //   'Q1'=>'required',
      //   'Q2'=>'required',
      //   'Q3'=>'required',
      //   'Q4'=>'required',
      //   'Q5'=>'required',
      //   'Q6'=>'required',
      //   'Q7'=>'required',
      //   'Q8'=>'required',
      //   'Q9'=>'required',
      //   'Q10'=>'required',
      //   'finalScore'=>'numeric',
      //   'finalComment'=>'required',
      // ]);

      // $forex->user_id= $request->agentID;
      $forex->user_id= $request->user_id;
      $forex->QA_id = $request->QA_id;
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
      $forex->phone = $request->phone;    
      $forex->score= $request->finalScore;
      $forex->final_comment = $request->finalComment;
      $forex->audio = $request->audio;
      $forex->audioTwo = $request->audioTwo;  
      $forex->nameSupervisor = $request->nameSupervisor;
      $forex->dateToday = $request->dateToday;
    
      

      if($forex->save()){
        return redirect('admin/forex')->with('success','stored successfully');
      }else{
        //   return "NO sirve";
        echo "Hola Mundo";
        //   // return redirect('admin/forex')->withInput($request->only('Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','finalComment'));
      }
    }

    /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
    */
    public function show($id) {
      //
    }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
    */
    public function edit($id) {
      //
    }

    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
      //
    }

    /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        //
    }

    public function getAllScores(){
      // $this->user = Casemanager::select(
      $this->user = Forex::select(
        array(
          'forexes.id as DT_RowId','users_table.name as name','quality_table.name as qaname',
          'forexes.score as score','forexes.audio as audio','forexes.created_at as date' ,'forexes.phone as phone'
        )
      )
      ->leftJoin('users as users_table','users_table.id','=','forexes.user_id')
      ->leftJoin('users as quality_table','quality_table.id','=','forexes.QA_id')
      ->orderBy('forexes.created_at','desc')
      ->take(800)
      ->get();

      $users = $this->user->toArray();
      $data = array();
      
      foreach ($users as $key => $user){
      // echo $ids[0]['name'];
      // $users[$key]['sup']= $ids[0]['name'];
  
        $users[$key]['DT_RowAttr'] = array(
          'title'	=>	'Manage score of: '.$user['name'],
          'data-toggle'  => "popover",
          'data-trigger' => "focus",
          'data-content'	=>	"
            <div>
              <a class='btn btn-secondary btn-block' href='javascript:showComments(".$user['DT_RowId'].")'>View comments</a>
              <form style='margin-top: 5px;' action='".url("admin/scoreAftha/".$user['DT_RowId'])."' method='post'>".csrf_field().method_field('DELETE')."
                <button value='submit' class='btn btn-danger btn-block'>
                  <span class='glyphicon glyphicon-ban-circle pull-left'></span>Delete evaluation
                </button>
              </form>
            </div>"
        );
      }
        
      $data['data'] = $users;

      return json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getComments($id){
      $comments = Forex::select(
        array(
          'Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','final_comment','audio','audioTwo',
        )
        // array(
        //   'Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','final_comment','phone','audio','audioTwo',
        // )
      )->where('id',$id)->get();
  
      foreach ($comments as $key => $value) {
        echo $value['phone'].'=>';
        echo $value['audio'].'=>';
        echo $value['final_comment'].'=>';
  
        $a=1;
        do {
          echo $value['Q'.$a].'=>';
          $a++;
        } while (
          $a <= 10
        );
      }
    }

}
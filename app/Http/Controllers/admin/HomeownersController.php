<?php

namespace App\Http\Controllers\admin;
use App\Homeowners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeownersController extends Controller {
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.qa_homeowners_form');
    }

    /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $homeowners = new Homeowners();

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
    
        // $homeowners->user_id= $request->agentID;
        $homeowners->user_id= $request->user_id;
        $homeowners->QA_id = $request->QA_id;
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
        $homeowners->phone = $request->phone;    
        $homeowners->score= $request->finalScore;
        $homeowners->final_comment = $request->finalComment;
        $homeowners->audio = $request->audio;
        $homeowners->audioTwo = $request->audioTwo;  
        $homeowners->nameSupervisor = $request->nameSupervisor;
        $homeowners->dateToday = $request->dateToday;
      
        
    
        if($homeowners->save()){
          return redirect('admin/homeowners')->with('success','Homeowners stored successfully');
        }else{
          //   return "NO sirve";
          echo "Hola Mundo";
          //   // return redirect('admin/homeowners')->withInput($request->only('Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','finalComment'));
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
        $this->user = Casemanager::select(
          array(
            'casemanagers.id as DT_RowId',
            'users_table.name as name',
            'quality_table.name as qaname',
            'casemanagers.score as score',
            'casemanagers.audio as audio',
            'casemanagers.created_at as date' ,
            'casemanagers.phone as phone',
            'casemanagers.acknowledge as acknowledge'
          )
        )
        ->leftJoin(
          'users as users_table',
          'users_table.id',
          '=',
          'casemanagers.user_id'
        )
        ->leftJoin(
          'users as quality_table',
          'quality_table.id',
          '=',
          'casemanagers.QA_id'
        )
        ->orderBy(
          'casemanagers.created_at',
          'desc'
        )
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
        $comments = Casemanager::select(
          array(
            'final_comment','phone','audio','audioTwo','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10'
          )
        )->where('id',$id)->get();
    
        foreach ($comments as $key => $value) {
          echo $value['phone'].'=>';
          echo $value['audio'].'=>';
            
          $c = 1;
          do { 
            echo $value['C'.$c].'=>';
            $c++;
          } while (
            $c <= 10
          );
    
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

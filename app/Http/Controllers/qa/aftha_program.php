<?php

namespace App\Http\Controllers\qa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\aftha_quality;
use DB;
use App\User;
class aftha_program extends Controller
{
    // public $aftha= null;
    public $sale = null;

    public function showForm(){
        return view('qa.qa_aftha_form');
    }

    public function store(Request $request){
       $aftha = new aftha_quality();
       $request->validate([
           'Q1'=>'required',
           'Q2'=>'required',
           'Q3'=>'required',
           'Q4'=>'required',
           'Q5'=>'required',
           'Q6'=>'required',
           'C1'=>'max:189',
           'C2'=>'max:189',
           'C3'=>'max:189',
           'C4'=>'max:189',
           'C5'=>'max:189',
           'C6'=>'max:189',
           'finalScore'=>'numeric',
           'finalComment'=>'required',
       ]);
        $aftha->Q1 = $request->Q1;
        $aftha->Q2 = $request->Q2;
        $aftha->Q3 = $request->Q3;
        $aftha->Q4 = $request->Q4;
        $aftha->Q5 = $request->Q5;
        $aftha->Q6 = $request->Q6;
        $aftha->C1 = $request->C1;
        $aftha->C2 = $request->C2;
        $aftha->C3 = $request->C3;
        $aftha->C4 = $request->C4;
        $aftha->C5 = $request->C5;
        $aftha->C6 = $request->C6;
        $aftha->score= $request->finalScore;
        $aftha->QA_id = $request->QA_id;
        $aftha->user_id= $request->agentID;
        $aftha->audio = $request->audio;
        $aftha->final_comment = $request->finalComment;
        if($aftha->save()){
            return redirect('qa/qa-aftha-form')->with('success','Qualify stored successfully');
        }else{
            return redirect('qa/qa-aftha-form')->withInput($request->only('C1','C2','C3','C4','C5','C6','finalComment'));
        }

    }

    public function getAllScores(){
        $this->user = aftha_quality::
        select(array('aftha_qualities.id as DT_RowId','users.name as name','aftha_qualities.score as score',
                        'aftha_qualities.audio as audio','aftha_qualities.created_at as date' ))
                        ->join('users','users.id','=','aftha_qualities.user_id')
        ->take(800)->get();

                    $users = $this->user->toArray();
                    
                    $data = array();

                    foreach ($users as $key => $user){ 
                        
                    //    echo $ids[0]['name'];
                        // $users[$key]['sup']= $ids[0]['name'];
                       
                    	$users[$key]['DT_RowAttr'] = array(
                    			// 'title'	=>	'Manage inscription #: '.$user['name'],
                    			'data-toggle'  => "popover",
                     			'data-trigger' => "focus",
                    			'data-content'	=>	"<div>
                    										<form style='margin-top: 5px;'
                    											action='".url("/events/deleteInscription/".$user['DT_RowId'])."'
                    											method='post'>
                    												".csrf_field().
                    												method_field('DELETE')."
                    												<a href='".url("/events/deleteInscription/".$user['DT_RowId'])."'
                    													class='btn btn-danger btn-block'><span class='glyphicon glyphicon-ban-circle pull-left'>
                    													</span>Delete inscription</a>
                    										</form>
                    
                    								</div>"
                    	);
                    }
                    $data['data'] = $users;
                //     <form style='margin-top: 5px;'
                //     action='".url("/events/deleteInscription/".$user['DT_RowId'])."'
                //     method='post'>
                //         ".csrf_field().
                //         method_field('DELETE')."
                //         <a href='".url("/events/deleteInscription/".$user['DT_RowId'])."'
                //             class='btn btn-danger btn-block'><span class='glyphicon glyphicon-ban-circle pull-left'>
                //             </span>Delete inscription</a>
                // </form>
					//Set dates on session

					return json_encode($data, JSON_PRETTY_PRINT);


    }
}
// $this->aftha = DB::table('aftha_qualities')
//             ->select(array('aftha_qualities.id as DT_RowId','users.name','aftha_qualities.score as score',
//                 'aftha_qualities.audio as audio','aftha_qualities.created_at as date'))
//             ->join('users','aftha_qualities.user_id','=','users.id')
//             ->where('users.status',1)
//             ->get();


<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\aftha_quality;
use DB;
use App\User;
class aftha_program extends Controller
{
    public $aftha= null;
    public $sale = null;

    public function showForm(){
        return view('admin.qa_aftha_form');
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
	$aftha->Q7 = $request->Q7;
	$aftha->Q8 = $request->Q8;
	$aftha->Q9 = $request->Q9;
	$aftha->Q10 = $request->Q10;

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
        $aftha->score= $request->finalScore;
        $aftha->QA_id = $request->QA_id;
        $aftha->user_id= $request->agentID;
        $aftha->audio = $request->audio;
        $aftha->final_comment = $request->finalComment;
        $aftha->phone = $request->phone;
        if($aftha->save()){
            return redirect('admin/qa-aftha-form')->with('success','Qualify stored successfully');
        }else{
            return redirect('admin/qa-aftha-form')->withInput($request->only('C1','C2','C3','C4','C5','C6','finalComment'));
        }

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
    public function getAllScores(){

        $this->user = aftha_quality::
        select(array('aftha_qualities.id as DT_RowId','users_table.name as name','quality_table.name as qaname','aftha_qualities.score as score',
                        'aftha_qualities.audio as audio','aftha_qualities.created_at as date' ,'aftha_qualities.phone as phone', 'aftha_qualities.acknowledge as acknowledge'))
                        ->leftJoin('users as users_table','users_table.id','=','aftha_qualities.user_id')
                        ->leftJoin('users as quality_table','quality_table.id','=','aftha_qualities.QA_id')
                        ->orderBy('aftha_qualities.created_at','desc')
        ->take(800)->get();

                    $users = $this->user->toArray();

                    $data = array();

                    foreach ($users as $key => $user){

                    //    echo $ids[0]['name'];
                        // $users[$key]['sup']= $ids[0]['name'];

                    	$users[$key]['DT_RowAttr'] = array(
                    			 'title'	=>	'Manage score of: '.$user['name'],
                    			'data-toggle'  => "popover",
                     			'data-trigger' => "focus",
                                'data-content'	=>	"<div>
                                                            <a class='btn btn-secondary btn-block' href='javascript:showComments(".$user['DT_RowId'].")'>View comments</a>
                    										<form style='margin-top: 5px;'
                    											action='".url("admin/scoreAftha/".$user['DT_RowId'])."'
                    											method='post'>
                    												".csrf_field().
                    												method_field('DELETE')."
                    												<button value='submit'
                    													class='btn btn-danger btn-block'><span class='glyphicon glyphicon-ban-circle pull-left'>
                    													</span>Delete evaluation</button>
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
    public function destroy($id){
        $user = aftha_quality::find($id);
        $user->delete();
        return redirect('/admin/scoreAftha')->with('success','evaluation deleted');
    }
}
// $this->aftha = DB::table('aftha_qualities')
//             ->select(array('aftha_qualities.id as DT_RowId','users.name','aftha_qualities.score as score',
//                 'aftha_qualities.audio as audio','aftha_qualities.created_at as date'))
//             ->join('users','aftha_qualities.user_id','=','users.id')
//             ->where('users.status',1)
//             ->get();

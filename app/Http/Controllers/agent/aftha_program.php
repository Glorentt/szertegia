<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\aftha_quality;
class aftha_program extends Controller
{
    public function index(){
        return view('agent.aftha_scores');
    }

    public function setAsRead(Request $request){
        var_dump($request);
        $evaluation = aftha_quality::find($request->comment);
        $evaluation->acknowledge = 1;
        if ($evaluation->save()) {
            echo "done";
        }
        else {
            echo "error";
        }
    }

    public function getMyComments($id){
        $comments = aftha_quality::select(array('C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','C12','C13','C14','C15','C16','C17','C18','C19','C20','final_comment','phone','audio','acknowledge','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12','Q13','Q14','Q15','Q16','Q17','Q18','Q19','Q20'))
        ->where('id',$id)->get();
        foreach ($comments as $key => $value) {
            echo $value['phone'].'=>';
            echo $value['audio'].'=>';
            
            $c = 1;
            do {
              echo $value['C'.$c].'=>';
                    $c++;
            } while ($c <= 20);
            echo $value['final_comment'].'=>';

            $a=1;
            do {
                echo $value['Q'.$a].'=>';
                    $a++;
            } while ($a <= 20);
        }
    }

    public function getComments($id){
        $comments = aftha_quality::select(array('C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','final_comment','phone','audio','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8',
        'Q9','Q10','Q11','id'))
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

        $this->user = aftha_quality::select(
            array(
                'aftha_qualities.id as DT_RowId','users_table.name as name','quality_table.name as qaname','aftha_qualities.score as score',
                'aftha_qualities.audio as audio','aftha_qualities.created_at as date' ,'aftha_qualities.phone as phone','aftha_qualities.acknowledge as acknowledge'
            )
        )
        ->leftJoin('users as users_table','users_table.id','=','aftha_qualities.user_id')
        ->leftJoin('users as quality_table','quality_table.id','=','aftha_qualities.QA_id')
        ->orderBy('aftha_qualities.created_at','DESC')
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
                'data-content'	=>	"
                    <div>
                        <a class='btn btn-secondary btn-block' href='javascript:showComments(".$user['DT_RowId'].")'>View comments</a>
                        <form style='margin-top: 5px;' action='".url("/events/deleteInscription/".$user['DT_RowId'])."' method='post'>".csrf_field().method_field('DELETE')."
                            <a href='".url("/events/deleteInscription/".$user['DT_RowId'])."'class='btn btn-danger btn-block'>
                                <span class='glyphicon glyphicon-ban-circle pull-left'></span>Delete inscription
                            </a>
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

    public function indexMyScores(){
      return view('agent.myAftha_scores');
    }

    public function getMyScores(Request $request){
        $idUser = $request->session()->get('id');
        $this->user = aftha_quality::select(
            array(
                'aftha_qualities.id as DT_RowId','users_table.name as name','quality_table.name as qaname',
                'aftha_qualities.score as score','aftha_qualities.audio as audio','aftha_qualities.created_at as date',
                'aftha_qualities.phone as phone', 'aftha_qualities.acknowledge as acknowledge'
            )
        )
        ->leftJoin('users as users_table','users_table.id','=','aftha_qualities.user_id')
        ->leftJoin('users as quality_table','quality_table.id','=','aftha_qualities.QA_id')
        ->where('users_table.id',$idUser)
        ->orderBy('aftha_qualities.created_at','DESC')
        ->take(800)
        ->get();
                    
        $users = $this->user->toArray();
        $data = array();

        foreach ($users as $key => $user){
            // echo $ids[0]['name'];
            // $users[$key]['sup']= $ids[0]['name'];
            $users[$key]['DT_RowAttr'] = array(
                'title' =>  'Manage score of: '.$user['name'],
                'data-toggle'  => "popover",
                'data-trigger' => "focus",
                'data-comment' => $user['DT_RowId'],
                'data-content'	=>	"<div>
                                        <a class='btn btn-secondary btn-block' href='javascript:showComments(".$user['DT_RowId'].")'>View comments</a>
                                    </div>"
            );
        }
        
        $data['data'] = $users;
        //  <form style='margin-top: 5px;' action='".url("/events/deleteInscription/".$user['DT_RowId'])."' method='post'>
        //      ".csrf_field().method_field('DELETE')."
        //      <a href='".url("/events/deleteInscription/".$user['DT_RowId'])."' class='btn btn-danger btn-block'><span class='glyphicon glyphicon-ban-circle pull-left'>
        //          </span>Delete inscription</a>
        //  </form>
        //  Set dates on session
        
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}

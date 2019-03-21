<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\showslinger;
class ShowSlingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.formShowSlinger');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "olis";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $show = new showslinger();
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
            'Q13'=>'required',
            'Q14'=>'required',
        
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
            'C13'=>'max:189',
            'C14'=>'max:189',

            'finalScore'=>'numeric',
            'finalComment'=>'required'
        ]);
        $show->Q1 = $request->Q1;
        $show->Q2 = $request->Q2;
        $show->Q3 = $request->Q3;
        $show->Q4 = $request->Q4;
        $show->Q5 = $request->Q5;
        $show->Q6 = $request->Q6;
        $show->Q7 = $request->Q7;
        $show->Q8 = $request->Q8;
        $show->Q9 = $request->Q9;
        $show->Q10 = $request->Q10;
        $show->Q11 = $request->Q11;
        $show->Q12 = $request->Q12;
        $show->Q13 = $request->Q13;
        $show->Q14 = $request->Q14;
  
        $show->C1 = $request->C1;
        $show->C2 = $request->C2;
        $show->C3 = $request->C3;
        $show->C4 = $request->C4;
        $show->C5 = $request->C5;
        $show->C6 = $request->C6;
        $show->C7 = $request->C7;
        $show->C8 = $request->C8;
        $show->C9 = $request->C9;
        $show->C10 = $request->C10;
        $show->C11 = $request->C11;
        $show->C12 = $request->C12;
        $show->C13 = $request->C13;
        $show->C14 = $request->C14;

        $show->score= $request->finalScore;
        $show->QA_id = $request->QA_id;
        $show->user_id= $request->agentID;
        $show->audio = $request->audio;
        $show->FC = $request->finalComment;
        $show->phone = $request->phone; 
        if($show->save()){
            return redirect('admin/bizwell')->with('success','Qualify stored successfully');
        }else{
            return redirect('admin/bizwell')->withInput($request->only('C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','C12','C13','C14','finalComment','audio'));
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
        
    }
    public function getComments($id){
        $comments = showslinger::select(array('C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','C12','C13','C14','FC','phone','audio','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12','Q13','Q14'))
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
            echo $value['C12'].'=>';
            echo $value['C13'].'=>';
            echo $value['C14'].'=>';
      
            echo $value['FC'].'=>'; 
            $a=1;
            do {
                echo $value['Q'.$a].'=>'; 
                    $a++;
            } while ($a <= 14);
                         
            
            
        }
    }
    public function getAllScores(){
        $this->user = showslinger::
        select(array('showslingers.id as DT_RowId','users.name as name','showslingers.score as score',
                        'showslingers.audio as audio','showslingers.created_at as date' ,'showslingers.phone as phone'))
                        ->join('users','users.id','=','showslingers.user_id')->orderBy('showslingers.created_at','desc')
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

<?php

namespace App\Http\Controllers\admin;
use App\Szertexington;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SzertexingtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Szertexington.Szertexington');
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
    public function store(Request $request)
    {
        $Sze = new Szertexington();

    $request->validate([
      'Q1'=>'required',
      'Q2'=>'required',
      'Q3'=>'required',
      'Q4'=>'required',
      'Q5'=>'required',
      'Q6'=>'required',
      'Q7'=>'required',
      'Q8'=>'required',
      'C1'=>'max:189',
      'C2'=>'max:189',
      'C3'=>'max:189',
      'C4'=>'max:189',
      'C5'=>'max:189',
      'C6'=>'max:189',
      'C7'=>'max:189',
      'C8'=>'max:189',
      'finalScore'=>'numeric',
      'finalComment'=>'required',
    ]);

    $Sze->Q1 = $request->Q1;
    $Sze->Q2 = $request->Q2;
    $Sze->Q3 = $request->Q3;
    $Sze->Q4 = $request->Q4;
    $Sze->Q5 = $request->Q5;
    $Sze->Q6 = $request->Q6;
    $Sze->Q7 = $request->Q7;
    $Sze->Q8 = $request->Q8;

    $Sze->C1 = $request->C1;
    $Sze->C2 = $request->C2;
    $Sze->C3 = $request->C3;
    $Sze->C4 = $request->C4;
    $Sze->C5 = $request->C5;
    $Sze->C6 = $request->C6;
    $Sze->C7 = $request->C7;
    $Sze->C8 = $request->C8;
    $Sze->score= $request->finalScore;
    $Sze->QA_id = $request->QA_id;
    $Sze->user_id= $request->agentID;
    $Sze->audio = $request->audio;
    $Sze->final_comment = $request->finalComment;
    $Sze->phone = $request->phone;
    if($Sze->save()){
        return redirect('admin/Szertexington')->with('success','Qualify stored successfully');
      }else{
        return redirect('admin/Szertexington')->withInput($request->only('C1','C2','C3','C4','C5','C6','C7','C8','finalComment'));
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
        $user = Szertexington::find($id);
    $user->delete();
    return redirect('/admin/scoreSzertexington')->with('success','evaluation deleted');
    }


    public function getAllScores(){
        $this->user = Szertexington::select(
          array('szertexingtons.id as DT_RowId','users_table.name as name','quality_table.name as qaname','szertexingtons.score as score',
                        'szertexingtons.audio as audio','szertexingtons.created_at as date' ,'szertexingtons.phone as phone', 'szertexingtons.acknowledge as acknowledge')
        )
        ->leftJoin('users as users_table','users_table.id','=','szertexingtons.user_id')
        ->leftJoin('users as quality_table','quality_table.id','=','szertexingtons.QA_id')
        ->orderBy('szertexingtons.created_at','desc')
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
                <form style='margin-top: 5px;' action='".url("admin/Szertexington/".$user['DT_RowId'])."' method='post'>".csrf_field().method_field('DELETE')."
                  <button value='submit' class='btn btn-danger btn-block'>
                    <span class='glyphicon glyphicon-ban-circle pull-left'></span>Delete evaluation
                  </button>
                </form>
              </div>"
          );
        }
          
        $data['data'] = $users;
        //  <form style='margin-top: 5px;'
        //  action='".url("/events/deleteInscription/".$user['DT_RowId'])."'
        //  method='post'>
        //  ".csrf_field().
        //  method_field('DELETE')."
        //  <a href='".url("/events/deleteInscription/".$user['DT_RowId'])."'
        //  class='btn btn-danger btn-block'><span class='glyphicon glyphicon-ban-circle pull-left'>
        //  </span>Delete inscription</a>
        //  </form>
        // Set dates on session
        return json_encode($data, JSON_PRETTY_PRINT);
      }

      public function getComments($id){
        $comments = Szertexington::select(array('C1','C2','C3','C4','C5','C6','C7','C8','final_comment','phone','audio','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8'))
        ->where('id',$id)->get();
    
        foreach ($comments as $key => $value) {
          echo $value['phone'].'=>';
          echo $value['audio'].'=>';
            
          $c = 1;
          do { 
            echo $value['C'.$c].'=>';
            $c++;
          } while (
            $c <= 8
          );
    
          echo $value['final_comment'].'=>';
    
          $a=1;
          do {
            echo $value['Q'.$a].'=>';
            $a++;
          } while (
            $a <= 8
          );
        }
      }
}

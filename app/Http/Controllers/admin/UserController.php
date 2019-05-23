<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $user= null;
    public function index()
    {
        return view('admin.users');
    }

    public function getAllUsers(){

        $this->user = User::
        select(array( 'id as DT_RowId','name', 'email','role_id','status','sup','phone','status','created_at'))
        ->take(800)->get();

                    $users = $this->user->toArray();

                    $data = array();

                    foreach ($users as $key => $user){
                        if ($users[$key]['role_id']==1) {
                            $users[$key]['role_id']='admin';
                        }elseif ($users[$key]['role_id']==2) {
                            $users[$key]['role_id']='QA';
                        }elseif ($users[$key]['role_id']==3) {
                            $users[$key]['role_id']='Supervisor';
                        }else {
                            $users[$key]['role_id']='agent';
                        }

                        $ids = User::select('name')->where('id',$user['sup'])->get();
                        $ids = $ids->toArray();
                        $result = array_values(array_column($ids, 'name'));
                        if ($ids != null) {
                            $users[$key]['sup']= $result[0];
                        }else{
                            $users[$key]['sup']= 'no one';
                        }



                    //    echo $ids[0]['name'];
                        // $users[$key]['sup']= $ids[0]['name'];

                    	$users[$key]['DT_RowAttr'] = array(
                    			'title'	=>	'Manage user: '.$user['name'],
                    			'data-toggle'  => "popover",
                     			'data-trigger' => "focus",
                                'data-content'	=>	"<div>

                                                            <a class='btn btn-success btn-block' href='javascript:showEdit(".$user['DT_RowId'].")'>Editar</a>
                                                            <a class='btn btn-warning btn-block' data-id='".$user['DT_RowId']."' data-name='".$user['name']."' id='buttonModalPassword' data-toggle='modal'  href='#modalPassword'>
                                                              Reset password
                                                            </a>
                    										<form style='margin-top: 5px;'
                    											action='".url("/admin/users/".$user['DT_RowId'])."'
                    											method='post'>
                    												".csrf_field().
                    												method_field('DELETE')."
                    												<button value='".$user['DT_RowId']."' name='userID'
                    													class='btn btn-danger btn-block'><span class='glyphicon glyphicon-ban-circle pull-left'>
                    													</span>Delete User</a>
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:100',
            'lastName'=>'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role_id' =>'required|numeric',
            'supID' =>'required|numeric',
            'phone'=>'required|numeric'
        ]);


        $user = new User();
        $fullname = $request['name']." ".$request['lastName'];
        $user->name = $fullname;
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role_id = $request['role_id'];
        $user->sup = $request['supID'];
        $user->phone= $request['phone'];
        $user->campaign= $request['campaign'];


        if($user->save()){
            return redirect('admin/users')->with('success','Registered user successfully');
        }else{
            return redirect('admin/users')->withInput($request->only('email','name','role_id','supID','phone'));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // echo $request['editname'];
        // echo $request['editrole_id'];
        // echo $request['editphone'];
        // var_dump($request['editpassword']);
        // echo $request['editsupid'];
        $request->validate([
            'editname' =>'required|max:100',
            'editrole_id' =>'required|numeric',
            'editphone'=>'required|numeric'
        ]);

        // if (isset($request['editpassword']) || trim($request['editpassword']) != '') {
        //     $request->validate([
        //         'editpassword' => 'required|min:6|confirmed'
        //     ]);
        //     $user->password = bcrypt($request['editpassword']);
        // }
        $user = User::find($id);
        $user->name = $request['editname'];
        $user->role_id = $request['editrole_id'];
        $user->sup = $request['editsupid'];
        $user->phone= $request['editphone'];
        $user->campaign= $request['editcampaign'];
        if($user->save()){
            return redirect('admin/users')->with("success","Actualizado correctamente");
        }
        return redirect('admin/users')->with("error","ther was an error");
        // echo "editar";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        $usr =$user->toArray();
        echo $usr['id'].",";
        echo $usr['name'].",";
        echo $usr['email'].",";
        $sup = User::find($usr['sup'])->toArray();
        echo $usr['sup'].",";
        
        echo $sup['name'].",";
        echo $usr['campaign'].",";
        echo $usr['phone'].",";
        $role = DB::table('roles')->find($usr['role_id']);
        echo $usr['role_id'].",";
        echo $role->role;
        


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

        echo "method update";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('admin/users')->with('success','user deleted');
    }
    public function liveSearchNames($name){
        $users = User::select(array('id','name'))
        ->where('status',1)
        ->where('name','like','%'.$name.'%' )->get();
        foreach ($users as $key => $value) {
            echo $value['id'].'=>';
            echo $value['name'].',';
        }
    }

    public function change_password(Request $request){
      $request->validate([
        'password' => ['required',
                 'min:6', 
                 'confirmed']
      ]);
      $id = $request->userId;
      $user = User::find($id);
      $user->password = bcrypt($request->password);
      if ($user->save()) {
        return redirect('admin/users')->with('success','password changed correctly');
      }else{
        return redirect('admin/users')->with('error','failed changing password');
      }

      // $user = Users::find()
      // $request->password
    }

    public function liveSearchSupervisors($name){
        $sups = User::select('id','name')
        ->where('status',1)
        ->where('role_id',1)
        ->where('name','like','%'.$name.'%' )
        ->get();
        $su= $sups->toArray();

        foreach ($su as $key => $value) {
            echo $value['id']."=>";
            echo $value['name'].",";
        }
    }


}

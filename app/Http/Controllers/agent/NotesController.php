<?php

namespace App\Http\Controllers\agent;
use App\notes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Session::get('id');
        $notes = notes::select(array('*'))->where('user_id',$id)->orderBy("created_at","desc")->get();
        
        // foreach ($notes as $key => $value) {
        //     echo $value->id;
        // }
        return view('agent.notes')->with('notes',$notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = $request->validate([
            'comment' => 'required|max:255'  
        ]);

        $Note = new notes();
        $Note->Comment = $request->comment;
        $Note->user_id = \Session::get('id');
        $Note->save();
        return redirect('agent/notes');
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
    public function borrarPerro($id){
        $users = Notes::find($id);
        $users->delete();

        return  redirect(route('agent.notes'));
    }
}

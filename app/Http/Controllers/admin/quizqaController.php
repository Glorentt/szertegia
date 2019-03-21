<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
class quizqaController extends Controller
{
    /** Display a listing of the resource. */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','user']);
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
        // return 'Hola! desde el controlador resource';
    }

    /** Show the form for creating a new resource. */
    public function create()
    { 
        return view('trainers.create'); 
    }

    /** Store a newly created resource in storage. */
    public function store(StoreTrainerRequest $request)
    {
        $trainer = new Trainer();

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().'_'.$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/', $name);
        }
        $trainer->name = $request->input('name');
        $trainer->slug = $request->input('slug');
        $trainer->save();
        
        return redirect()->route('trainers.index');
        // return 'Saved';
    }

    /** Display the specified resource. */
    public function show(Trainer $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    /** Show the form for editing the specified resource. */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().'_'.$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/', $name);
        }
        $trainer->slug = $request->input('slug');
        $trainer->save();

        return redirect()->route('trainers.show', [$trainer])->with('status','Entrenador Actualizado Correctamente');
        // return 'updated';
    }

    /** Remove the specified resource from storage. */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
        
        return redirect()->route('trainers.index');
        // return 'deleted';
        // return $file_path;
    }
}

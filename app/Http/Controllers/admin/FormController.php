<?php

namespace App\Http\Controllers\admin;

use App\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public $form = null;
    public function index(Request $request)
    { 
        $forms=\App\Form::paginate(5);
        return view('admin.forms', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('form.create');
        return view('form.registerForm');
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
            'form_name' =>'required|max:100',
        ]);

        $form = new Form();
        $form->form_name = $request['form_name'];
        
        if($form->save()){
            return redirect('admin/forms')->with('success','Registered form successfully');
        }else{
            return redirect('admin/forms')->withInput($request->only('form_name'));
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
        $form = Form::find($id);
        return view('admin.viewForm', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forms = Form::findorFail($id);
        $quest =$forms->toArray();
        echo $quest['id'].",";
        echo $quest['form_name'].",";
        echo $quest['user_id'].",";
        echo $quest['created_at'].",";
        echo $quest['updated_at'];
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
    public function destroy(Request $request, $id)
    {
        if(Form::destroy($id)) {
            return redirect('admin/forms')->with('success', 'Eliminado correctamente');
        } else {
            return redirect('admin/forms')->with('error', 'ther was an error');
        }
    }
}

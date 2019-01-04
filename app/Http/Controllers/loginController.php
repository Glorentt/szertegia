<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\Role;

class loginController extends Controller
{

    public function login(Request $request){
       
        //validate the form data
        $this->validate($request,[
          'email' => 'required|email',
          'password' => 'required|min:6'
        ]);
        //attempt to log the user in
        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password, 'status'=>'1'], $request->remember)) {
            //if success,, then redirect their intended locatoin

            $usuario_actual = \Auth::user();
            $rol = Role::find($usuario_actual->role_id);
            $id = $usuario_actual->id;
            var_dump($rol);
            $name = explode(" ",$usuario_actual->name) ;
            \Session::put('id',$id);
            \Session::put('name',$name[0]);
            \Session::put('rol',$rol->role);
            \Session::put('email',$request->email);
            return redirect()->intended(route('inicio'));
        }
        //if unsuccessful , then redirect back to the login with the form data
        return redirect('/')->withInput($request->only('email','remember'));
    }
    public function logout(){
        Auth::guard()->logout();
        \Session::flush();
        \Session::regenerate();
        return redirect('/');
      }
    
    public function register(Request $request){
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    public function showRegistrationForm(){
       return view('admin.registerUser');
    }
}

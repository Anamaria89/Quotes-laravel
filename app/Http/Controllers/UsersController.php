<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function login(){
        
        if(request()->isMethod('post')){
            // validacija forme
            request()->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
                'password' => 'required'
            ]);
            // proba logovanja
            if(Auth::attempt([
                'name' => request('name'),
                'email' => request('email'),
                'password' => request('password'),
                
            ])){
                // TRUE - redirect na welcome ili tamo gde je hteo da ode ranije
                return redirect()->intended( route('home') );
            }else{ 
                // FALSE - redirect back sa greskom da je los email ili lozinka
                return redirect( route('login') )
                        ->withErrors(['email' => trans('auth.failed')])
                        ->withInput(['email' => request('email')]);
            }
        }
            
        
        return view('admin.users.login');
    }
    public function create(){
        
        return view('admin.users.register');
    }
    public function register(){
       
        //validacija
        $data = request()->validate([
            'name' => 'required|string|min:3|max:191',
            'email' => 'required|string|unique:users,email|max:191',
            'password' => 'required|string|min:5|max:191|confirmed',
            'password_confirmation' => 'required|string|min:5|max:191'
           
        ]);
        
        // dopuna $data
       
        $data['password'] = Hash::make($data['password']);
        $data['password_confirmation'] = Hash::make($data['password_confirmation']);
        
        User::create($data);
        
         return redirect()->route('login');
          
    
    }
    
     public function logout(){
        // uradi logout
        Auth::logout();
        
        // nakon toga uradi redirect tamo gde zeli vlasnik portala
        return redirect()->route('login')->withErrors(['message' => 'Thank you, come again!!!']);
    }
}

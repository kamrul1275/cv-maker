<?php

namespace App\Http\Controllers\backend\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function showLoginForm(){
        return view('backend.auth.login');
    }


function login(Request $request){
    $credentials = $request->only('email', 'password');
   // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            // $request->authenticate();
          
    
            if($request->user()->role ==='admin'){
    
                return redirect()->intended('/admin/dashboard');
    
            }elseif($request->user()->role ==='user'){
    
                return redirect()->intended('/dashboard');
            }
    
            // return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    
}

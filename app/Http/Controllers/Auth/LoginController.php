<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.login');
    }

    
    public function approve(Request $request){
        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        $remember = 0;

        if($request->chkremember == "on")
        {
            $remember = 1;
        }
        
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials,$remember))
        {
            return redirect('/');
        }
        else 
        {
            return redirect('/login')->with('message','Invalid credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

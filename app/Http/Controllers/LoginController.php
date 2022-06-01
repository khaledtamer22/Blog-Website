<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index() {

        return view('view');

    }

        public function save(Request $req) {

        $validated = $req->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if(Auth::attempt($validated,$req->input('remember'))){

            $req->session()->regenerate();
            return redirect()->intended("admin");
        }

        return back()->withErrors([
            'email' => 'Wrog emial or password'
        ]);
            
        
        
    }
}
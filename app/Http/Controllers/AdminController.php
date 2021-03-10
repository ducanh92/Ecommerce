<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function loginAdmin() {
        if ( Auth::check() && Gate::allows('access-admin') ) {
            return redirect()->to('home');
        }
        return view('login');
    }

    public function postLoginAdmin(Request $request) {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
            ], $remember)) {
            if (!Gate::allows('access-admin')) {
                return redirect()->route('home');
            }
            return redirect()->to('home');
        };
    }

    public function logOut()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('home');
        }
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function SubmitFormLogin(Request $request) {
        if(Auth::attempt($request->except(['_token']))) {
            return to_route('home');
        } else {
            return to_route('login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return to_route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function SubmitFormRegister(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email' ,
            'username' => 'required|min:3|max:255' ,
            'password' => 'required|min:3|max:16|confirmed',
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'required|max:50',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        User::create($validated);
        return to_route('login');

    }

    public function RegisterProductOwner(Request $request) {
        $user = Auth::user();
        $user->role = 'seller';
        $user->save();
        return to_route('home');
    }
}

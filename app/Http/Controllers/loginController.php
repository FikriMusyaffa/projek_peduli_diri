<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class loginController extends Controller
{
    Public function __construct(){
        $this->middleware('guest')->except('LogOut');
    }

    Public function loginPage(){
        return view('pages.login');
    }

    Public function Login(Request $request){
        if (Auth::attempt($request->only('name', 'email', 'password'))){
            // Kondisi jika login berhasil
            return redirect('/')->with('login-berhasil', 'Login berhasil !');
        }
        // Kondisi jika login gagal
        return redirect('/login')->with('login-gagal', "Login gagal! NIK atau Nama tidak ditemukan");
    }

    Public function LogOut(){
        Auth::logout();
        return redirect('/login');
    }
}

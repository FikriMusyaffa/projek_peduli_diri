<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    Public function halamanRegister(){
        return view('pages.register');
    }

    Public function simpanRegister(Request $request){

        $request->validate(
        [
            'nik'=>'required|unique:users,email|max:16|min:16|min:0|digits:16',
            // 'nik'=>'required|unique:users,email|numeric|max:16|min:16|min:0',
            'name'=>'required'
        ],
        [
            'nik.unique'=>'NIK sudah terdaftar',
            'name.required'=>'nama tidak boleh kosong'
        ]);

        $data=[
            'name'=>$request->name,
            'email'=>$request->nik,
            'password'=>bcrypt($request->nik)
        ];

        User::create($data);
        // dd($data);
        return redirect('/login')->with('register-berhasil', 'Register berhasil ! silahkan login');
    }
}

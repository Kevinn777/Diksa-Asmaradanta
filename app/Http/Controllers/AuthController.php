<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function actionLogin(Request $request){
        // return $request->all();
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::Attempt($data)){
            $name = Auth::user()->name;
            if(Auth::user()->role == 'admin'){
                return redirect('/admin/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('error', 'Username or Password incorect');
        }
    }

    public function actionRegister(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            // 'tanggal_lahir' => 'required',
            // 'jenis_kelamin' => 'required',
            // 'nomor_hp' => 'required',
            'email' => 'required|unique:users',
            'status' => 'required',
            'jabatan' => 'required',
            'password' => 'required'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'tanggal_lahir' => $request->tanggal_lahir,
            // 'jenis_kelamin' => $request->jenis_kelamin,
            // 'nomor_hp' => $request->nomor_hp,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('success', 'Register Success!');
    }

    public function actionLogout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }
}

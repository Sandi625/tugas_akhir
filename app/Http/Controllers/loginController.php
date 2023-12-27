<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login() {
        return view("login");

    }


    public function loginproses(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }

        return \redirect('login')->with('error', 'Invalid credentials');

    }
    public function register(){
        return view('register');
    }

    public function registeruser(Request $request){
      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'phone_number' =>$request->phone_number,
        'username' => $request->username,
        'remember_token' => str::random(60),

    ]);

    return redirect('/');



    }

    public function logout(){
        Auth::logout();
        return \redirect('login');
    }




}

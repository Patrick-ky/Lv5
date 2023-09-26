<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class Authcontroller extends Controller
{
    function login(){

        return view('login');
    }


    function registration(){
        return view('registration');
    }


    function loginp(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('homepage'))->with("logged in Successfully");
        };
        return redirect(route('login'))->with("error", "Login failed, please check your email and password");
    }

    function registrationp(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "Registration failed, please check your Name, email and password");
        }
        return redirect(route('login'))->with("Success", "Registration success");
    }


    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }


    function welcome()
    {
        $users = User::all();

        return(compact('users'));
    }


}

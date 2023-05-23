<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManegerController extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }
        return view ('login');
    }
    function regestration (){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }

        return view ('regestration');
    }
    function loginPost(request $request){
$request->validate([
    'email'=>'required',
    'password'=>'required'
]);
$credentials = $request->only('email','password');
if(Auth::attempt($credentials)){
    return redirect()->intended(route('home'))->with("success","login details are  valid");
}
return redirect(route('login'))->with("error","login details are not valid");

 }
function regestrationpost(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
    ]);
    $data['name']=$request->name;
    $data['email']=$request->email;
    $data['password']=Hash::make($request->password) ;
    $user = User::create($data);

    if(!$user){
        return redirect(route(name:'regestration'))->with("error","regestration failed ,try again");

    }
    return redirect(route('login'))->with("success","regestration success, now go to login");
    }
    function logout(){
        session::flush();
        Auth::logout();
    }
}

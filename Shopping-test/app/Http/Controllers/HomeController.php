<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function login() {
        return view('admin.login');
    }
    public function postLogin(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }else{
            return view('admin.login');
        }
    }
    public function logOut() {
        Auth::logout();
        return view('admin.login');
    }
    public function index(){
        if(auth()->check()){
            return view('home.index');
        }else{
            return view('admin.login');
        }
    }
}

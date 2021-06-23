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
        $remember = $request->has('remember_me') ? true :false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember)) {
            return redirect()->to('home');
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

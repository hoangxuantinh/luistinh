<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\setting;

class UiController extends Controller
{
    
    public function index() {
        $products = product::all();

        return view('frontend.layouts.master',compact('products'));
    }
    public function login() {
        return view('frontend.login');
    }
    public function postLogin(Request $request) {
        $remember = $request->remember ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, $remember])) {
            return redirect()->route('trangchu');
        }
    }
    public function logout() {
        auth()->logout();
    }
}

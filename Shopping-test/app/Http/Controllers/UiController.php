<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Socialite;

class UiController extends Controller
{
    public function index() {
        $products = product::get();
        return view('frontend.index',compact('products'));
    }
    public function login() {
        return view('frontend.login');
    }
    public function getInfor($social) {
        return Socialite::driver($social)->redirect();
    }
    public function checkInfor($social) {
        $info = Socialite::dirver($social)->user();
        dd($info);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart\Cart;
use App\Models\product;
use DB;
class CartController extends Controller
{
    
    public function add(Request $request,$id) {
        $product = product::find($id);
        if( $product) {
            $oldCart = session('cart') ? session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($id,$product);
            $request->session()->put('cart',$newCart);
        }
        return view('frontend.cart.cart_change');

    }
    public function deleteCart($id) {
        $oldCart = session('cart') ? session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCart($id);
        if(count($newCart->products) > 0){
            session()->put('cart',$newCart);
        }else{
            session()->forget('cart');
        }
        return view('frontend.cart.cart_change');
    }
}

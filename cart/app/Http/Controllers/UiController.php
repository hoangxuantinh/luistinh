<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart\Cart;

class UiController extends Controller
{
    public function index() {
        $products = DB::table('products')->take(9)->get();
        $category = DB::table('categories')->get();
       
        return view('ui.index',compact('products','category'));
    }
    public function home() {
        $products = DB::table('products')->take(9)->get();
        $category = DB::table('categories')->get();
        
        return view('ui.index',compact('products','category'));
    }
    public function addCart(Request $request, $id){
        $product = DB::table('products')->find($id);
        if($product != null) {
            $oldCart = session('cart') ? session('cart') :null;
            $newCart = new Cart($oldCart);
            $newCart->addCard($product,$id);
            $request->session()->put('cart',$newCart);
        }
        return view('carts.cart_sub');
    }
    public function deleteCart($id){
        
        $oldCart = session('cart') ? session('cart') :null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCard($id);
        if( count($newCart->products) > 0 ){
            session()->put('cart',$newCart);
        }
        else{
            session()->forget('cart');
        }
        
        return view('carts.cart_sub');
    }
    public function deleteCartlist($id) {
        $oldCart = session('cart') ? session('cart') :null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCard($id);
        if( count($newCart->products) > 0 ){
            session()->put('cart',$newCart);
        }
        else{
            session()->forget('cart');
        }
        
        return view('ui.carts.carts_list_change');
    }
    public function updateCart(Request $request,$id) {
        $oldCart = session('cart') ? session('cart') :null;
        $newCart = new Cart($oldCart);
        $newCart->updateCartItem($id,$request->quantity);
        
        session()->put('cart',$newCart);
       
        return view('ui.carts.carts_list_change');
    }
    public function updateALLCart(Request $request) {
        foreach($request->list as $item) {
            $oldCart = session('cart') ? session('cart') :null;
            $newCart = new Cart($oldCart);
            $newCart->updateCartItem($item['id'],$item['value']);
            
            session()->put('cart',$newCart);
        }
        return view('ui.carts.carts_list_change');
    }
    public function listCart(){
        return view('ui.carts.cart_list');
    }
    
}

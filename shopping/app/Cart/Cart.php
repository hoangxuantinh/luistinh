<?php 
namespace App\Cart;
class Cart{
    public $products = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;
    public function __construct($cart) {
        if( isset($cart) ) {
            $this->products = $cart->products;
            $this->totalQuantity = $cart->totalQuantity;
            $this->totalPrice = $cart->totalPrice;
        }
    }
    public function addCart($id,$product) {
        $newProduct = ['quantity' => 0,'price' => $product->price,'productInfor' => $product];
        if( $this->products) {
            if( array_key_exists($id,$this->products) ){
               $newProduct = $this->products[$id];
           }
        }
        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalQuantity++;
        $this->totalPrice += $product->price;
    }
    public function deleteCart($id) {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

}
<?php
namespace App\Cart;
class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public function __construct($carts) {
        if($carts) {
            $this->products = $carts->products;
            $this->totalPrice = $carts->totalPrice;
            $this->totalQuantity = $carts->totalQuantity;
        }
    }
    public function addCard($product,$id) {
        $newProduct = ['quantity' => 0,'price' => $product->price, 'productIfor' => $product];
        if($this->products) {
            if(array_key_exists($id,$this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuantity++;

    }    
    public function deleteCard($id) {
        
        $this->totalPrice -= $this->products[$id]['price'];
        $this->totalQuantity -= $this->products[$id]['quantity'];
        unset($this->products[$id]);
    }
    public function updateCartItem($id,$quantity) {
        //trừ đi số lượng và tiền ban đầu
        $this->totalPrice -= $this->products[$id]['price'];
        $this->totalQuantity -= $this->products[$id]['quantity'];
        //update lại thằng products
        $this->products[$id]['quantity'] = $quantity;
        $this->products[$id]['price'] = $quantity * $this->products[$id]['productIfor']->price;
        //cộng tiền và sl sản phẩm lại cho carts
        $this->totalPrice += $this->products[$id]['price'];
        $this->totalQuantity += $this->products[$id]['quantity'];

    }
}
?>
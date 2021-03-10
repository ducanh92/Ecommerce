<?php

namespace App;

class Cart {
    public $products;
    public $totalQuantity;
    public $totalPrice;

    public function __construct($previousCart)
    {
        if($previousCart) {
            $this->products = $previousCart->products;
            $this->totalQuantity = $previousCart->totalQuantity;
            $this->totalPrice = $previousCart->totalPrice;
        }
        else {
            $this->products = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function addProduct($id, $product)
    {
        if( array_key_exists($id, $this->products) ) {
            $productToAdd = $this->products[$id];
            $productToAdd['quantity']++;
        }
        else {
            $productToAdd = ['quantity' => 1, 'price' => $product->price, 'data' => $product];
        }
        $this->products[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice += $product->price;
    }

    public function updateCartQuantityAndPrice()
    {
        $this->totalPrice = 0;
        $this->totalQuantity = 0;
        foreach ($this->products as $product) {
            $this->totalPrice += $product['price'] * $product['quantity']; 
            $this->totalQuantity += $product['quantity'];
        }
    }
}
?>
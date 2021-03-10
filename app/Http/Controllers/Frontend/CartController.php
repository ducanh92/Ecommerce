<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Category;
use App\Product;

class CartController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart');
        if ( !$cart or (count($cart->products) == 0) ) {
            return redirect()->route('home');
            echo '<script language="javascript">';
            echo 'alert("Your cart is empty")';
            echo '</script>';
        }

        $menuCategories = $this->category->where('parent_id', 0)->take(5)->get();

        return view('frontend.cart.list', compact('menuCategories', 'cart'));
    }

    public function addProductToCart(Product $product, Request $request)
    {
        $previousCart = $request->session()->get('cart');
        $cart = new Cart($previousCart);
        $cart->addProduct($product->id, $product);
        $request->session()->put('cart', $cart);
    }

    public function deleteProductFromCart($id, Request $request)
    {
        $cart = $request->session()->get('cart');
        if ( array_key_exists($id, $cart->products) ) {
            unset($cart->products[$id]);
            $cartAfterDeleting = $request->session()->get('cart');
            $cartAfterDeleting->updateCartQuantityAndPrice();
            $request->session()->put('cart', $cartAfterDeleting);
        }
    }

    public function updateItemPrice($id, Request $request)
    {
        $previousCart = $request->session()->get('cart');
        $newItemQuantity = $request->input('itemQuantity');
        $previousCart->products[$id]['quantity'] = $newItemQuantity;
        $previousCart->updateCartQuantityAndPrice();
        $request->session()->put('cart', $previousCart);
        $cart = $request->session()->get('cart');
        $response = $cart->products[$id]['quantity'] * $cart->products[$id]['price'];

        return $response;
    }

    public function getCart(Request $request)
    {
        $cart = $request->session()->get('cart');
        return response()->json($cart);
    }
}

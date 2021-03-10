<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $product;
    private $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function search(Request $request)
    {
        $menuCategories = $this->category->where('parent_id', 0)->take(5)->get();
        $parentCategories = $this->category->where('parent_id', 0)->get();
        $featuredProducts = $this->product->latest()->take(6)->get();

        $keyword = $request->search;
        $products = $this->product->where('name', 'LIKE', '%'.$keyword.'%')->paginate(9);
        return view('frontend.product.list', compact('menuCategories', 'products', 'parentCategories', 'featuredProducts'));
    }

    public function showCheckoutPage(Request $request)
    {
        $menuCategories = $this->category->where('parent_id', 0)->take(5)->get();
        $parentCategories = $this->category->where('parent_id', 0)->get();

        $cart = $request->session()->get('cart');
        if ( !$cart or (count($cart->products) == 0) ) {
            return redirect()->route('home');
        }

        return view('frontend.product.checkout', compact('menuCategories', 'parentCategories','cart'));
    }

    public function showProductDetail(Product $product)
    {
        $menuCategories = $this->category->where('parent_id', 0)->take(5)->get();
        $parentCategories = $this->category->where('parent_id', 0)->get();
        $productImages = DB::table('product_images')->where('product_id', $product->id)->get();
        $recommendedProducts = $this->product->orderBy('view_count', 'desc')->get();
        
        return view('frontend.product.detail', compact('menuCategories', 'parentCategories', 'product', 'productImages', 'recommendedProducts'));
    }
}

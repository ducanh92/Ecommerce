<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Slider;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;

    public function __construct(Slider $slider, Category $category, Product $product)
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        $sliders = $this->product->latest()->take(3)->get();
        $parentCategories = $this->category->where('parent_id', 0)->get();
        $featuredProducts = $this->product->latest()->take(6)->get();
        $recommendedProducts = $this->product->orderBy('view_count', 'desc')->get();
        $menuCategories = $this->category->where('parent_id', 0)->take(5)->get();

        return view( 'frontend.home.home', compact('sliders', 'parentCategories', 'featuredProducts', 'recommendedProducts', 'menuCategories') );
    }

    public function contact()
    {
        $menuCategories = $this->category->where('parent_id', 0)->take(5)->get();

        return view( 'frontend.home.contact', compact('menuCategories') );
    }
}

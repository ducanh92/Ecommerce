<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index($slug, Category $category)
    {
        $parentCategories = $this->category->where('parent_id', 0)->get();
        $menuCategories = $this->category->where('parent_id', 0)->take(5)->get();
        $products = $category->products()->paginate(9);

        return view('frontend.product.list', compact('category', 'parentCategories', 'menuCategories', 'products'));
    }
}

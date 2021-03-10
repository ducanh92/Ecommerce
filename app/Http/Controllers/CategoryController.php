<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $categories;

    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    public function getCategory($parentId)
    {
        $allCategories = $this->categories->all();
        $recursive = new Recursive($allCategories);
        $htmlCategoryOptions = $recursive->categoryRecursive($parentId);
        return $htmlCategoryOptions;
    }

    public function index()
    {
        $this->authorize('category-list', Category::class);
        
        $categories = $this->categories->paginate(5);
        return view('admin.category.index')->with('categories', $categories);
    }

    public function create()
    {
        $this->authorize('category-add', Category::class);

        $htmlCategoryOptions = $this->getCategory($parentId = '');
        return view('admin.category.add')->with('htmlCategoryOptions', $htmlCategoryOptions);
    }

    public function store(Request $request)
    {
        $this->categories->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('category.create');
    }

    public function edit($id)
    {
        $this->authorize('category-edit', Category::class);

        $category = $this->categories->find($id);
        $htmlCategoryOptions = $this->getCategory($category->parent_id);
        return view('admin.category.edit')->with([
            'category' => $category,
            'htmlCategoryOptions' => $htmlCategoryOptions
            ]);
    }
    
    public function update(Request $request, $id)
    {
        $this->categories->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->name
        ]);
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $this->authorize('category-delete', Category::class);

        $this->categories->find($id)->delete();
        
        return redirect()->route('category.index');
    }
}

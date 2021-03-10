<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recursive;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Traits\StorageImageTrait;
use App\Product;
use App\ProductImage;
use App\Tag;
use App\ProductTag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProductAddRequest;
use App\Traits\DeleteModelInstanceTrait;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageImageTrait, DeleteModelInstanceTrait;

    private $categories;
    private $product;
    private $product_image;
    private $tag;
    private $product_tag;

    public function __construct(Category $categories, Product $product, ProductImage $product_image, Tag $tag, ProductTag $product_tag) {
        $this->categories = $categories;
        $this->product = $product;
        $this->product_image = $product_image;
        $this->tag = $tag;
        $this->product_tag = $product_tag;
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
        $product = $this->product->paginate(5);
        return view('admin.product.index')->with('products', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlCategoryOptions = $this->getCategory($parentId = '');
        return view('admin.product.add')->with('htmlCategoryOptions', $htmlCategoryOptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();

            $dataUploadImage = $this->storageUploadTrait($request, 'feature_image_path', 'product');

            $dataCreateProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'content' => $request->content,
            ];
    
            if ( !empty($dataUploadImage) ) {
                $dataCreateProduct['feature_image_path'] = $dataUploadImage['file_path'];
                $dataCreateProduct['feature_image_name'] = $dataUploadImage['file_name'];
            }
    
            $product = $this->product->create($dataCreateProduct);
    
            // Store product_images data
    
            if ( $request->hasFile('image_path') ) {
                foreach ($request->image_path as $image) {
                    $productImageDetail = $this->storageMultipleUploadTrait($image, 'product');
    
                    $product->productImages()->create([
                        'image_path' => $productImageDetail['file_path'],
                        'image_name' => $productImageDetail['file_name']
                    ]);
                }
            }
    
            // Store tags to tags and product_tags table

            $tagIds[] = [];
    
            foreach ( $request->tags as $tag ) {
                $tagInstance = $this->tag->firstOrCreate([
                    'name' => $tag
                ]);
    
                $tagIds[] = $tagInstance->id;
            }
    
            $product->tags()->attach($tagIds);

            DB::commit();
    
            return redirect()->route('products.create');
        }
        catch (\Exception $exception) {
            DB::rollBack();
            Log::error( 'Message: ' . $exception->getMessage() . '.' . ' Line: ' . $exception->getLine() );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('product-edit', $product);
        
        $htmlCategoryOptions = $this->getCategory($product->category_id);

        return view('admin.product.edit')->with([
            'product' => $product,
            'htmlCategoryOptions' => $htmlCategoryOptions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            DB::beginTransaction();

            $dataUploadImage = $this->storageUploadTrait($request, 'feature_image_path', 'product');

            $dataUpdateProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'content' => $request->content,
            ];
    
            if ( !empty($dataUploadImage) ) {
                $dataUpdateProduct['feature_image_path'] = $dataUploadImage['file_path'];
                $dataUpdateProduct['feature_image_name'] = $dataUploadImage['file_name'];
            }
    
            $product->update($dataUpdateProduct);
            $productUpdate = $product;

            // Store product_images data
    
            if ( $request->hasFile('image_path') ) {
                $this->product_image->where('product_id', $productUpdate->id)->delete();
                foreach ($request->image_path as $image) {
                    $productImageDetail = $this->storageMultipleUploadTrait($image, 'product');
    
                    $productUpdate->productImages()->create([
                        'image_path' => $productImageDetail['file_path'],
                        'image_name' => $productImageDetail['file_name']
                    ]);
                }
            }
    
            // Store tags to tags and product_tags table

            $tagIds[] = [];

            foreach ( $request->tags as $tag ) {
                $tagInstance = $this->tag->firstOrCreate([
                    'name' => $tag
                ]);
    
                $tagIds[] = $tagInstance->id;
            }
    
            $productUpdate->tags()->sync($tagIds);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            Log::error( 'Message: ' . $exception->getMessage() . '.' . ' Line: ' . $exception->getLine() );
        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return $this->deleteInstance($product);
    }
}

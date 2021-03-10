@extends('layouts.admin')

@section('title')
    <title>Products</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Product', 'key' => 'Update'])
        <!-- Main content -->
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter product name" value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter product price" value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                                <div class="col-md-12">
                                    <div class="row image_container">
                                        <img class="product_image_150_100" src="{{ $product->feature_image_path }}" alt="#">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Detailed images</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                                <div class="col-md-12">
                                    <div class="row image_container">
                                        @foreach ($product->productImages as $productImage)
                                            <div class="col-md-3">
                                                <img class="product_image_150_100" src="{{ $productImage->image_path }}" alt="#">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            
    
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select_init" name="category_id">
                                  <option value="0">Select category</option>
                                    {!! $htmlCategoryOptions !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <select class="form-control tags_select_choose" multiple name="tags[]">
                                    @foreach ($product->tags as $tag)
                                        <option value={{ $tag->name }} selected>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
    
                            
                        
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Product details</label>
                            <textarea class="form-control tinymce_editor_init" rows="8" name="content" value="{{ $product->content }}">{{ $product->content }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

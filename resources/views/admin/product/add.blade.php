@extends('layouts.admin')

@section('title')
    <title>Products</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <!-- Main content -->

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf

                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Enter product name" value="{{ old('name') }}">

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                    placeholder="Enter product price" value="{{ old('price') }}">

                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label>Detailed images</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>



                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select_init @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="">Select category</option>
                                    {!! $htmlCategoryOptions !!}
                                </select>

                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <select class="form-control tags_select_choose" multiple name="tags[]">

                                </select>
                            </div>




                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product details</label>
                                <textarea class="form-control tinymce_editor_init @error('content') is-invalid @enderror"
                                    rows="8" name="content"> {{ old('content') }} </textarea>

                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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

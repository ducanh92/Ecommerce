@extends('layouts.admin')

@section('title')
    <title>Products</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetalert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admins/ajax-delete.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>
                                            <img class="product_image_150_100" src="{{ $product->feature_image_path }}" alt="#">
                                        </td>
                                        <td>{{ optional($product->category)->name }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                                            <a 
                                                href="" 
                                                class="btn btn-danger confirm-delete"
                                                data-url ="{{ route('products.destroy', $product) }}">
                                                    Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

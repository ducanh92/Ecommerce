@extends('layouts.admin')

@section('title')
    <title>Categories</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @can('category-add')
                            <a href="{{ route('category.create') }}" class="btn btn-success float-right m-2">Add</a>
                        @endcan
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @can('category-edit')
                                                <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-primary">Edit</a>
                                            @endcan

                                            @can('category-delete')
                                                <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        {{ $categories->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

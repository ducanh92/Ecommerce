@extends('layouts.admin')

@section('title')
    <title>Categories</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Category', 'key' => 'Edit'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Category name</label>
                                <input  type="text" 
                                        class="form-control" 
                                        name="name" 
                                        placeholder="Nhập tên danh mục"
                                        value="{{ $category->name }}">
                            </div>
    
                            <div class="form-group">
                                <label>Parent category</label>
                                <select class="form-control" name="parent_id">
                                  <option value="0">Select parent category</option>
                                  {!! $htmlCategoryOptions !!}
                                </select>
                              </div>
    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@extends('layouts.admin')

@section('title')
    <title>Menu</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Menu', 'key' => 'Edit'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    <form action="{{ route('menus.update', $menu) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            
                            <div class="form-group">
                                <label>Category name</label>
                                <input  type="text" 
                                        class="form-control" 
                                        name="name" 
                                        placeholder="Enter category name"
                                        value="{{ $menu->name }}">
                            </div>
    
                            <div class="form-group">
                                <label>Parent category</label>
                                <select class="form-control" name="parent_id">
                                  <option value="0">Select parent category</option>
                                  {!! $htmlOptions !!}
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

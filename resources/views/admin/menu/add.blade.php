@extends('layouts.admin')

@section('title')
    <title>Menu</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Menu', 'key' => 'Add'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    <form action="{{ route('menus.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Menu name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter menu name">
                            </div>
    
                            <div class="form-group">
                                <label>Parent menu</label>
                                <select class="form-control" name="parent_id">
                                  <option value="0">Select parent menu</option>
                                  {!! $menuOptions !!}
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

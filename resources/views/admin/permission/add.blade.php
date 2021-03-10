@extends('layouts.admin')

@section('title')
    <title>Permissions</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Permission', 'key' => 'Add'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Parent permission</label>
                                <select class="form-control" name="parent_module">
                                    <option value="">Select parent permission</option>

                                    @foreach (config('permissions.parent_module') as $parentModule)
                                        <option value="{{ $parentModule }}">{{ $parentModule }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">

                                    @foreach (config('permissions.children_module') as $childrenModule)
                                        <div class="col-md-3">
                                            <input type="checkbox" value="{{ $childrenModule }}" name="children_module[]"> {{ $childrenModule }}
                                        </div>
                                    @endforeach

                                </div>
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

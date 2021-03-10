@extends('layouts.admin')

@section('title')
    <title>Role</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins/role/add/add.css') }}">
    
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Role', 'key' => 'Edit'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <form id="role-form" action="{{ route('roles.update', $role) }}" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Role name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Enter role name" value="{{ $role->name }}">
                            </div>

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Role description</label>
                                <textarea type="text" class="form-control @error('display_name') is-invalid @enderror"
                                    name="display_name" placeholder="Enter role description" value=""
                                    rows="4">{{ $role->display_name }}
                                </textarea>
                            </div>

                            @error('display_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12" id="check_all_wrapper">
                                    <input type="checkbox" class="check_all">
                                    Check all
                                </div>

                                @foreach($parentPermissions as $parentPermission)
                                    <div class="card border-primary mb-3 col-md-12">

                                        <div class="card-header">
                                            <input type="checkbox" value="" class="checkbox_parent">
                                            Module {{ $parentPermission->name }}
                                        </div>

                                        <div class="row">
                                            @foreach($parentPermission->childrenPermission as $childrenPermissionItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <input type="checkbox" value="{{ $childrenPermissionItem->id }}" name="permission_id[]" class="checkbox_children"
                                                            {{ $checkedPermissions->contains('id', $childrenPermissionItem->id) ? 'checked' : '' }}>
                                                    {{ $childrenPermissionItem->name }}
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

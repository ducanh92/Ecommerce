@extends('layouts.admin')

@section('title')
    <title>Users</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins/user/add/add.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/user/add/add.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'User', 'key' => 'Add'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Enter name" value="{{ old('name') }}">
                            </div>

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Email</label>
                                <input  type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Enter email" value="{{ old('email') }}">
                            </div>

                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Password</label>
                                <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Enter password" value="{{ old('password') }}">
                            </div>

                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach

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

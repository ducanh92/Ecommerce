@extends('layouts.admin')

@section('title')
    <title>Role</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/index/list.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetalert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admins/ajax-delete.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $role->id }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary">Edit</a>
                                            <a  href="#" 
                                                class="btn btn-danger confirm-delete"
                                        data-url="{{ route('roles.destroy', $role) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        {{ $roles->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

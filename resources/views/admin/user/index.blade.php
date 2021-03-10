@extends('layouts.admin')

@section('title')
    <title>Users</title>
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
        @include('partials.content-header', ['name' => 'User', 'key' => 'Add'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
                                            <a  href="#" 
                                                class="btn btn-danger confirm-delete"
                                                data-url="{{ route('users.destroy', $user) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        {{ $users->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

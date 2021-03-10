@extends('layouts.admin')

@section('title')
    <title>Settings</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/settings/index/index.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetalert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admins/ajax-delete.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Setting', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group btn btn-success">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                              Action
                              <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="{{ route('settings.create') . '?type=Text' }}">Text</a></li>
                              <li><a href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Config key</th>
                                    <th scope="col">Config value</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <th scope="row">{{ $setting->id }}</th>
                                        <td>{{ $setting->config_key }}</td>
                                        <td>{{ $setting->config_value }}</td>
                                        <td>
                                        <a href="{{ route('settings.edit', $setting) . '?type=' . $setting->type }}" class="btn btn-primary">Edit</a>
                                            <a  href="" class="btn btn-danger confirm-delete"
                                                data-url="{{ route('settings.destroy', $setting) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        {{ $settings->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

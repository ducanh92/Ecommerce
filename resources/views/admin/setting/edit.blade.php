@extends('layouts.admin')

@section('title')
    <title>Settings</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Category', 'key' => 'Add'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.update', $setting) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror"
                            name="config_key" placeholder="Enter config key" value="{{ $setting->config_key }}">
                            </div>

                            @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                        name="config_value" placeholder="Enter config value"
                                        value="{{ $setting->config_value }}">
                                </div>

                                @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value" placeholder="Enter config value" rows="5">{{ $setting->config_value }}</textarea>
                                </div>

                                @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endif

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

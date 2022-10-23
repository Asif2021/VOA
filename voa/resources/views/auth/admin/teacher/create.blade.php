@extends('auth.admin.layouts.app')

@section('title', 'VOA - Teachers')

@push('style')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('assets/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Teacher</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Basic Info
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2">
                                <form role="form" method="POST" action="{{ route('admin.teacher.store') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->first('name') ? 'has-error' : 'has-success' }}">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus tabindex="1">
                                        <p class="help-block">{{ $errors->first('name') ? $errors->first('name') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('email') ? 'has-error' : 'has-success' }}">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" tabindex="2">
                                        <p class="help-block">{{ $errors->first('email') ? $errors->first('email') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('username') ? 'has-error' : 'has-success' }}">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" tabindex="3">
                                        <p class="help-block">{{ $errors->first('username') ? $errors->first('username') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('subject') ? 'has-error' : 'has-success' }}">
                                        <label>Subject</label>
                                        <select name="subject" id="" class="form-control" tabindex="4">
                                            <option value="">Select Subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->title }} - {{ $subject->subject_code }}</option>
                                            @endforeach
                                        </select>
                                        <p class="help-block">{{ $errors->first('subject') ? $errors->first('subject') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('password') ? 'has-error' : 'has-success' }}">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" tabindex="4">
                                        <p class="help-block">{{ $errors->first('password') ? $errors->first('password') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('password_confirmation') ? 'has-error' : 'has-success' }}">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" tabindex="5">
                                        <p class="help-block">{{ $errors->first('password_confirmation') ? $errors->first('password_confirmation') : '' }}</p>
                                    </div>
                                    <button type="submit" class="btn btn-success">Add Teacher</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection

@push('script')
@endpush

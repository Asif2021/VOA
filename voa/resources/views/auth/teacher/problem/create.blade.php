@extends('auth.teacher.layouts.app')

@section('title', 'VOA - Lesson Problem')

@push('style')
@endpush

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lesson Problem</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Upload lesson problem
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <form role="form" method="POST" action="{{ route('teacher.problem.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus tabindex="1">
                                        <p class="help-block">{{ $errors->first('title') ? $errors->first('title') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('file') ? 'has-error' : '' }}">
                                        <label>Document File</label>
                                        <input type="file" name="file" class="form-control" value="{{ old('file') }}" autofocus tabindex="2">
                                        <p class="help-block">{{ $errors->first('file') ? $errors->first('file') : 'Select pdf, doc files only' }}</p>
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <a href="{{ route('teacher.dashboard') }}" class="btn btn-danger">Cancel</a>
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

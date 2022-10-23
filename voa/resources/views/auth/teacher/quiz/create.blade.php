@extends('auth.teacher.layouts.app')

@section('title', 'VOA - Quiz Assignment')

@push('style')
@endpush

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quiz Assignment</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Quiz Assignment
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <form role="form" method="POST" action="{{ route('teacher.quiz.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus tabindex="1">
                                        <p class="help-block">{{ $errors->first('title') ? $errors->first('title') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('marks') ? 'has-error' : '' }}">
                                        <label>Marks</label>
                                        <input type="number" name="marks" min="0" class="form-control" value="{{ old('marks') }}" autofocus tabindex="1">
                                        <p class="help-block">{{ $errors->first('marks') ? $errors->first('marks') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('expire') ? 'has-error' : '' }}">
                                        <label>Due Date</label>
                                        <input type="date" name="expire" class="form-control" value="{{ old('expire') }}" autofocus tabindex="1">
                                        <p class="help-block">{{ $errors->first('expire') ? $errors->first('expire') : '' }}</p>
                                    </div>
                                    <div class="form-group {{ $errors->first('file') ? 'has-error' : '' }}">
                                        <label>Quiz File</label>
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

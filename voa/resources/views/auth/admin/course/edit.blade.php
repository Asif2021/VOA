@extends('auth.admin.layouts.app')

@section('title', 'VOA - Courses')

@push('style')
@endpush

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Course</h1>
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
                            <div class="col-md-6 col-md-offset-2">
                                <form role="form" method="POST" action="{{ route('admin.course.update', $course->id) }}">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->first('title') ? 'has-error' : 'has-success' }}">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ? old('title') : $course->title }}" autofocus tabindex="1">
                                        <p class="help-block">{{ $errors->first('title') ? $errors->first('title') : '' }}</p>
                                    </div>
                                    <div class="form-group ">
                                        <label>Course Code</label>
                                        <input type="text" class="form-control" value="{{ $course->course_code }}" readonly>
                                    </div>
                                    <div class="form-group {{ $errors->first('description') ? 'has-error' : 'has-success' }}">
                                        <label>Description</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control" tabindex="4">{{ old('dexcription') ? old('dexcription') :$course->description }}</textarea>
                                        <p class="help-block">{{ $errors->first('description') ? $errors->first('description') : '' }}</p>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update Course</button>
                                    <a href="{{ route('admin.course.index') }}" class="btn btn-danger">Cancel</a>
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

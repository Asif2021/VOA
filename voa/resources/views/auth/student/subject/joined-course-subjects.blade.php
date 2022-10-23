@extends('auth.student.layouts.app')

@section('title', 'VOA - Joined Course Subject')

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
                <h1 class="page-header">{{ $subject->title }} <small>({{ $subject->subject_code }})</small></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Subject Teacher
                    </div>
                    <div class="panel-body">
                        @if(isset($teachers) && $teachers)
                        <form role="form" method="POST" action="{{ route('student.course.subject.teacher', ['course' => $course->id, 'subject' => $subject->id]) }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->first('teacher') ? 'has-error' : '' }}">
                                <div class="col-md-2">
                                    <label for="" >Teacher</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="teacher" id="" class="form-control">
                                        <option value="">Select Teacher</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">{{ $errors->first('teacher') ? $errors->first('teacher') : '' }}</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        @else
                            <div class="col-md-12">
                                <label for="">Name: {{ $subject->studentSubjectTeacher()->first()->name }}</label>
                            </div>
                            <div class="col-md-12">
                                <label for="">Email: {{ $subject->studentSubjectTeacher()->first()->email }}</label>
                            </div>
                        @endif
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Description
                    </div>
                    <div class="panel-body">
                        <p>{{ $subject->description }}</p>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        @if(!(isset($teachers) && $teachers))
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Virtual Books
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Uploaded at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $material)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        {{ $material->title }}
                                    </td>
                                    <td>{{ $material->created_at }}</td>
                                    <td>
                                        <a href="{{ asset($material->url) }}" target="_blank">Download <i class="fa fa-download"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Audio Lectures
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Uploaded at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lectures as $material)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        {{ $material->title }}
                                    </td>
                                    <td>{{ $material->created_at }}</td>
                                    <td>
                                        <a href="{{ asset($material->url) }}" target="_blank">Download <i class="fa fa-download"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Lesson  Problems
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Uploaded at</th>
                                <th>Problem</th>
                                <th>Solution</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($problems as $problem)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        {{ $problem->title }}
                                    </td>
                                    <td>{{ $problem->created_at }}</td>
                                    <td>
                                        <a href="{{ asset($problem->url) }}" target="_blank">Download <i class="fa fa-download"></i></a>
                                    </td>
                                    <td>
                                        @if($problem->solution)
                                            <a href="{{ asset($problem->solution->url) }}" target="_blank">Download <i class="fa fa-download"></i></a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        @endif
    </div>
    <!-- /#page-wrapper -->
@endsection

@push('script')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endpush

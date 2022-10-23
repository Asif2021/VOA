@extends('auth.student.layouts.app')

@section('title', 'VOA - Joined Course')

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
                <h1 class="page-header">{{ $course->title }} <small>({{ $course->course_code }})</small></h1>
                @if(auth()->user()->courses->contains('id', $course->id))
                    <div class="btn btn-outline-success btn-lg pull-right">Enrolled</div>
                @elseif($course->status)
                    <a href="{{ route('student.course.enroll', $course->id) }}" class="btn btn-outline-success btn-lg pull-right">Get Enroll</a>
                @else
                    <div class="btn btn-outline-success btn-lg pull-right">Inactive</div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Description
                    </div>
                    <div class="panel-body">
                        <p>{{ $course->description }}</p>
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
                    <div class="panel-heading ">
                        Subjects
                        <br>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Subject Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course->subjects as $subject)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $subject->title }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td class="center">{{ $subject->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('student.course.subject.joined.show', ['course' => $course->id, 'subject' => $subject->id]) }}"
                                           class="btn-link">view</a>
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
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
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

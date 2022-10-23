@extends('auth.admin.layouts.app')

@section('title', 'VOA - Subjects')

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
                <h1 class="page-header">Subjects</h1>
                <a href="{{ route('admin.course.subject.create', $course->id) }}" class="btn btn-outline-success btn-lg pull-right">Add Subject</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
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
                            @foreach($subjects as $subject)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $subject->title }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td class="center">{{ $subject->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <form action="{{ route('admin.course.subject.destroy', ['course' => $course->id, 'subject' =>$subject->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @if($subject->status)
                                                <a href="{{ route('admin.course.subject.mark', ['course' => $course->id, 'subject' =>$subject->id]) }}" class="btn-link ">Deactivate</a>
                                            @else
                                                <a href="{{ route('admin.course.subject.mark', ['course' => $course->id, 'subject' =>$subject->id]) }}" class="btn-link">Activate</a>
                                            @endif
                                            <a href="{{ route('admin.course.subject.show', ['course' => $course->id, 'subject' =>$subject->id]) }}" class="btn-link"><i class="fa fa-"></i></a>
                                            <a href="{{ route('admin.course.subject.edit', ['course' => $course->id, 'subject' =>$subject->id]) }}" class="btn-link"><i class="fa fa-edit fa-fw"></i></a>
                                            <button type="submit" class="btn-link"><i class="fa fa-trash"></i></button>
                                        </form>
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
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endpush

@extends('auth.teacher.layouts.app')

@section('title', 'VOA - Lesson Problems')

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
                <h1 class="page-header">Lesson Problems</h1>
                <a href="{{ route('teacher.problem.create') }}" class="btn btn-outline-success btn-lg pull-right">Upload new</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        Lesson problems and solution
                        <br>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Uploaded at</th>
                                <th>Problem</th>
                                <th>Solution</th>
                                <th>Action</th>
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
                                        <form action="{{ route('teacher.problem.solution', $problem->id) }}" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="file">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                            <button type="submit" class="btn-link">Update</button>
                                            @if($problem->solution)
                                            <a href="{{ asset($problem->solution->url) }}" target="_blank">Download Solution <i class="fa fa-download"></i></a>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('teacher.problem.destroy', $problem->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-link">Delete <i class="fa fa-trash"></i></button>
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

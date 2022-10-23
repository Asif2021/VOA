@extends('auth.teacher.layouts.app')

@section('title', 'VOA - Quiz Assignment')

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
                <h1 class="page-header">Assignment Attempts</h1>
                <a href="{{ route('teacher.quiz.create') }}" class="btn btn-outline-success btn-lg pull-right">Conduct Quiz</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        Quiz Assignment
                        <br>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Attempted by</th>
                                <th>Attempted at</th>
                                <th>Download Solution</th>
                                <th>Marks</th>
                            </tr>
                            </thead>
                             <tbody>
                            @foreach($attempts as $attempt)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $attempt->student->name }} <span class="text-muted">({{ $attempt->student->email }})</span></td>
                                    <td>{{ $attempt->attempt_at }}</td>
                                    <td>
                                        <a href="{{ asset($attempt->url) }}" target="_blank">Download <i class="fa fa-download"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('teacher.quiz.attempt', $attempt->id) }}" method="POST">
                                            <input type="number" name="marks" value="{{ $attempt->obtained }}">
                                            {{ csrf_field() }}
                                            {{ method_field('POSt') }}
                                            <button type="submit" class="btn-link">update</button>
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

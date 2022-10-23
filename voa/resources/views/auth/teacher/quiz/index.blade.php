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
                <h1 class="page-header">Quiz Assignment</h1>
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
                                <th>Title</th>
                                <th>Total Marks</th>
                                <th>Uploaded at</th>
                                <th>Expire at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quizes as $quiz)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        {{ $quiz->title }}
                                    </td>
                                    <td>{{ $quiz->marks }}</td>
                                    <td>{{ $quiz->created_at }}</td>
                                    <td>{{ $quiz->expires_at }}</td>
                                    <td>
                                        <form action="{{ route('teacher.quiz.destroy', $quiz->id) }}" method="POST">
                                            <a href="{{ route('teacher.quiz.show', $quiz->id) }}" >View</a>&nbsp;
                                            <a href="{{ asset($quiz->url) }}" target="_blank"> <i class="fa fa-download"></i></a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
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

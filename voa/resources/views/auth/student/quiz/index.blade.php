@extends('auth.student.layouts.app')

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
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @foreach($quizsubjects as $quizsubject)
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        {{ $quizsubject->title }}
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
                                <th>Obtained Marks</th>
                                <th>Uploaded at</th>
                                <th>Expire at</th>
                                <th>Assignment</th>
                                <th>Solution</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quizsubject->quiz as $quiz)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        {{ $quiz->title }}
                                    </td>
                                    <td>{{ $quiz->marks }}</td>
                                    <td>{{ isset($quiz->studentAttempt->first()['id']) ? $quiz->studentAttempt->first()->obtained : '-' }}</td>
                                    <td>{{ $quiz->created_at }}</td>
                                    <td>{{ $quiz->expires_at }}</td>
                                    <td>
                                        <a href="{{ asset($quiz->url) }}" target="_blank">Download <i class="fa fa-download"></i></a>
                                    </td>
                                    <td>
                                    @if(isset($quiz->studentAttempt->first()['id']))
                                            <a href="{{ asset($quiz->studentAttempt->first()->url) }}" target="_blank">Download <i class="fa fa-download"></i></a>
                                    @elseif($quiz->expires_at > \Carbon\Carbon::now())
                                        <form class="form-inline" action="{{ route('student.quiz.attempt', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="file" class="small ">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                            <button type="submit" class="btn-link"> Submit</button>
                                        </form>
                                    @else
                                        <a href="javascript:;" class="btn-link">Expired</a>
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
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @endforeach
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

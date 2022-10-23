@extends('auth.student.layouts.app')

@section('title', 'VOA - Teacher Profile')

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
                <div class="col-md-1">
                    <br>
                    <img class="img-responsive" src="{{ asset($teacher->image) }}" alt="profile Image">
                </div>
                <h1 class="page-header">{{ $teacher->name}} <small>({{ $teacher->username }})</small></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Profile
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-1">
                                <div class="form-group">
                                    <label>Name: {{ $teacher->name }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Email: {{ $teacher->email }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Subject: {{ $teacher->teacherSubject->title }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Phone: {{ $teacher->phone }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Gender: {{ $teacher->gender }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Address: {{ $teacher->address }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
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

@extends('auth.admin.layouts.app')

@section('title', 'VOA - Students')

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
                <h1 class="page-header">Students</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Students
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr class="odd gradeX">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->username }}</td>
                                    <td class="center">{{ $student->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @if($student->status)
                                                <a href="{{ route('admin.mark', $student->id) }}" class="btn-link ">Deactivate</a>
                                            @else
                                                <a href="{{ route('admin.mark', $student->id) }}" class="btn-link">Activate</a>
                                            @endif
                                            <button type="submit" class="btn-link">Delete</button>
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

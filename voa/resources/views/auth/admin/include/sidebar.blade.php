<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            {{--<li>--}}
                {{--<a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{ route('admin.student.index') }}"><i class="fa fa-users fa-fw"></i> Students</a>
            </li>
            <li>
                <a href="{{ route('admin.teacher.index') }}"><i class="fa fa-graduation-cap fa-fw"></i> Teachers</a>
            </li>
            <li>
                <a href="{{ route('admin.course.index') }}"><i class="fa fa-book fa-fw"></i> Courses</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

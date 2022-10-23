<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            {{--<li>--}}
                {{--<a href="{{ route('student.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{ route('student.course.index') }}"><i class="fa fa-book fa-fw"></i> Courses</a>
            </li>
            <li>
                <a href="{{ route('student.course.joined') }}"><i class="fa fa-book fa-fw"></i> Joined Courses</a>
            </li>
            <li>
                <a href="{{ route('student.teacher.index') }}"><i class="fa fa-graduation-cap fa-fw"></i> Teachers</a>
            </li>
            <li>
                <a href="{{ route('student.quiz.index') }}"><i class="fa fa-graduation-cap fa-fw"></i> Quizz Assignments</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

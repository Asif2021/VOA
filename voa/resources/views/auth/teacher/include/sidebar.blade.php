<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            {{--<li>--}}
                {{--<a href="{{ route('teacher.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{ route('teacher.subject') }}"><i class="fa fa-book fa-fw"></i> My Subject</a>
            </li>
            <li>
                <a href="{{ route('teacher.student.index') }}"><i class="fa fa-graduation-cap fa-fw"></i> Students</a>
            </li>
            <li>
                <a href="{{ route('teacher.material.index') }}"><i class="fa fa-dot-circle-o fa-fw"></i> Virtual Books & Tutorials</a>
            </li>
            <li>
                <a href="{{ route('teacher.material.audio.index') }}"><i class="fa fa-file-audio-o fa-fw"></i> Audio Lectures</a>
            </li>
            <li>
                <a href="{{ route('teacher.quiz.index') }}"><i class="fa fa-question"></i> Quiz Assignment</a>
            </li>
            <li>
                <a href="{{ route('teacher.problem.index') }}"><i class="fa fa-database"></i> Lesson Problem</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

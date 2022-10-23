<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['namespace' => 'Auth'], function (){

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::resource('/student', 'StudentController');

        Route::resource('/teacher', 'TeacherController');

        Route::get('mark/{user}', 'UserController@mark')->name('mark');

        Route::resource('/course', 'CourseController');

        Route::group(['prefix' => 'course/{course}', 'as' => 'course.'], function (){

            Route::get('mark', 'CourseController@mark')->name('mark');

            Route::resource('/subject', 'SubjectController');

            Route::group(['prefix' => 'subject/{subject}', 'as' => 'subject.'], function (){

                Route::get('mark', 'SubjectController@mark')->name('mark');
            });
        });

    });

    Route::group(['prefix' => 'teacher', 'as' => 'teacher.', 'middleware' => ['auth', 'teacher'], 'namespace' => 'Teacher'], function () {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/subject', 'SubjectController@index')->name('subject');

        Route::resource('/student', 'StudentController');

        Route::get('/material/audio', 'MaterialController@audio')->name('material.audio.index');

        Route::get('/material/audio/create', 'MaterialController@audiocreate')->name('material.audio.create');

        Route::post('/material/audio/store', 'MaterialController@audiostore')->name('material.audio.store');

        Route::resource('/material', 'MaterialController');

        Route::post('/problem/{problem}/solution', 'LessonProblemController@updatesolution')->name('problem.solution');

        Route::resource('/problem', 'LessonProblemController');

        Route::post('/attempt/{attempt}/', 'QuizController@attemptMarks')->name('quiz.attempt');

        Route::resource('/quiz', 'QuizController');
    });

    Route::group(['as' => 'student.', 'middleware' => ['auth', 'student'], 'namespace' => 'Student'], function () {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/course/joined', 'CourseController@joinedCourses')->name('course.joined');

        Route::resource('/course', 'CourseController');

        Route::group(['prefix' => 'course/{course}', 'as' => 'course.'], function (){

            Route::get('/enroll', 'CourseController@enroll')->name('enroll');

            Route::get('/joined', 'CourseController@showJoinedCourse')->name('joined.show');

            Route::resource('/subject', 'SubjectController');

            Route::get('/subject/{subject}/joined', 'SubjectController@joinedCourseSubject')->name('subject.joined.show');

            Route::post('/subject/{subject}/teacher', 'SubjectController@selectSubjectTeacher')->name('subject.teacher');
        });

        Route::resource('/teacher', 'TeacherController');

        Route::post('/quiz/{quiz}/attempt', 'QuizController@attempt')->name('quiz.attempt');

        Route::resource('/quiz', 'QuizController');
    });

});

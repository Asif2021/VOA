<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course1 = Course::create([
            'title' => 'Software Engineering',
            'course_code' => 'cse',
            'description' => 'Computer Software Engineering'
        ]);
        $course1->subjects()->create([
            'title' => 'Algorithm',
            'subject_code' => 'cse101',
            'description' => 'Fundamentals of Algorithm'
        ]);
        $course1->subjects()->create([
            'title' => 'Data Structure',
            'subject_code' => 'cse102',
            'description' => 'Data Structure'
        ]);
        $course1->subjects()->create([
            'title' => 'Operating System',
            'subject_code' => 'cse103',
            'description' => 'Operating System'
        ]);

        $course2 = Course::create([
            'title' => 'Web Designing',
            'course_code' => 'wd',
            'description' => 'Web Designing'
        ]);
        $course2->subjects()->create([
            'title' => 'Adobe Photoshop',
            'subject_code' => 'wd101',
            'description' => 'Adobe Photoshop'
        ]);
        $course2->subjects()->create([
            'title' => 'HTML & CSS',
            'subject_code' => 'wd102',
            'description' => 'HTML and CSS'
        ]);
        $course2->subjects()->create([
            'title' => 'Responsive Web',
            'subject_code' => 'wd103',
            'description' => 'Responsive web design'
        ]);

        $course3 = Course::create([
            'title' => 'Spoken English',
            'course_code' => 'elc',
            'description' => 'English Language Course'
        ]);
        $course3->subjects()->create([
            'title' => 'Business Communication',
            'subject_code' => 'elc101',
            'description' => 'Business Communication'
        ]);
        $course3->subjects()->create([
            'title' => 'Grammer',
            'subject_code' => 'elc102',
            'description' => 'English Grammar'
        ]);
        $course3->subjects()->create([
            'title' => 'Writing Skills',
            'subject_code' => 'elc103',
            'description' => 'Writing skills'
        ]);

    }
}

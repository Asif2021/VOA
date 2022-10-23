<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_teacher  = Role::where('name', 'teacher')->first();
        $role_student  = Role::where('name', 'student')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@voa.com';
        $admin->username = 'admin';
        $admin->password = bcrypt('secret');
        $admin->status = 1;
        $admin->image = '/img/default_avatar.png';
        $admin->save();
        $admin->roles()->attach($role_admin);

        $teacher = new User();
        $teacher->name = 'Teacher';
        $teacher->email = 'teacher1@voa.com';
        $teacher->username = 'teacher1';
        $teacher->password = bcrypt('secret');
        $teacher->status = 1;
        $teacher->subject_id = 4;
        $teacher->image = '/img/default_avatar.png';
        $teacher->save();
        $teacher->roles()->attach($role_teacher);

        $student1 = new User();
        $student1->name = 'Asif Ramzan';
        $student1->email = 'bc140402040@voa.com';
        $student1->username = 'asif';
        $student1->password = bcrypt('secret');
        $student1->status = 1;
        $student1->image = '/img/default_avatar.png';
        $student1->save();
        $student1->roles()->attach($role_student);

        $student2 = new User();
        $student2->name = 'Adeel Ahmed';
        $student2->email = 'bc130402634@voa.com';
        $student2->username = 'adeel';
        $student2->password = bcrypt('secret');
        $student2->status = 1;
        $student2->image = '/img/default_avatar.png';
        $student2->save();
        $student2->roles()->attach($role_student);

    }
}

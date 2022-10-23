<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('subject_id')->unsigned()->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_teachers');
    }
}

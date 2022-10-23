<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_problems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned()->nullable();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->text('url')->nullable();
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
        Schema::dropIfExists('lesson_problems');
    }
}

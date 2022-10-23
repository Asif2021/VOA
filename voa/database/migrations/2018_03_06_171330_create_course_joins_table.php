<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_joins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned()->nullable();
            $table->boolean('status')->default(true);
            $table->dateTime('end')->nullable();
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
        Schema::dropIfExists('course_joins');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttemptQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempt_quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->integer('quiz_id')->unsigned()->nullable();
            $table->integer('student_id')->unsigned()->nullable();
            $table->dateTime('attempt_at')->nullable();
            $table->double('obtained')->nullable();
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
        Schema::dropIfExists('attempt_quizzes');
    }
}

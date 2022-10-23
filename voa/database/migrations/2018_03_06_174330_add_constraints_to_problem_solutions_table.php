<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToProblemSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problem_solutions', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('lesson_problems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('problem_solutions', function (Blueprint $table) {
            $table->dropForeign('teacher_id');
            $table->dropForeign('problem_id');
        });
    }
}

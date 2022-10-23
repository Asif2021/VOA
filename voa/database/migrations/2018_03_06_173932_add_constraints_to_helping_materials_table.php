<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToHelpingMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('helping_materials', function (Blueprint $table) {
            $table->foreign('subject_ref_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('teacher_ref_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('helping_materials', function (Blueprint $table) {
            $table->dropForeign('subject_ref_id');
            $table->dropForeign('teacher_ref_id');
        });
    }
}

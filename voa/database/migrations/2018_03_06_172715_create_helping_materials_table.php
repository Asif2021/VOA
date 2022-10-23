<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpingMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helping_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->text('url')->nullable();
            $table->integer('subject_ref_id')->unsigned()->nullable();
            $table->integer('teacher_ref_id')->unsigned()->nullable();
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
        Schema::dropIfExists('helping_materials');
    }
}

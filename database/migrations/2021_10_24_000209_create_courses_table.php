<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->longText('Sub_Title');
            $table->string('Teacher');
            $table->string('Group');
            $table->string('Update');
            $table->string('Price');
            $table->string('Promotion');
            $table->string('End_Promotion');
            $table->longText('Objective');
            $table->longText('Content');
            $table->longText('Need');
            $table->longText('For_Who');
            $table->longText('Detail');
            $table->string('Image');
            $table->string('Serial');
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
        Schema::dropIfExists('courses');
    }
}

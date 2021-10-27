<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('Gender');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('NickName');
            $table->string('Tel');
            $table->string('Whatsapp');
            $table->string('Wechat');
            $table->string('Facebook');
            $table->string('Province');
            $table->string('District');
            $table->string('Village');
            $table->string('Image');
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
        Schema::dropIfExists('registers');
    }
}

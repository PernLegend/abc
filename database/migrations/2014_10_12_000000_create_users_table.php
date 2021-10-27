<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Gender');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('NickName');
            $table->string('Tel')->unique();
            $table->string('password');
            $table->string('Whatsapp')->nullable();
            $table->string('Wechat')->nullable();
            $table->string('Facebook');
            $table->string('Province');
            $table->string('District');
            $table->string('Village');
            $table->string('BirthDay');
            $table->string('isAdmin');
            $table->string('Image')->nullable();
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
        Schema::dropIfExists('users');
    }
}

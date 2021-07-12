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
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('address');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('zip_code');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['media','buisness']);
            $table->tinyInteger('status')->default(1);
            $table->text('file_name')->nullable();
            $table->text('file_path')->nullable();
            $table->rememberToken();
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

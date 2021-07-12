<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_details', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('website_link');
            $table->string('buisness_name');
            $table->string('additional_no');
            $table->enum('size',['S','M','L','XL','XXL']);
            $table->enum('m_type',['Radio','TV','Magazine Publisher','Newspaper Publisher','Broadcast TV or Cable','Internet TV',
            'Affiliate Marketer','Influencer','Vlogger','Blogger'])->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('payment_detail')->default(0);
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
        Schema::dropIfExists('media_details');
    }
}

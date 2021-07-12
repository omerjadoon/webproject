<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticapteCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('particapte_campaigns', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('parti_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('ad_id')->unsigned();
            $table->foreign('ad_id')->references('id')->on('adsections')->onUpdate('cascade')->onDelete('cascade');  
            $table->bigInteger('posted_ad_user_id')->unsigned();
            $table->foreign('posted_ad_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');  
            $table->bigInteger('hit_count')->default(0);
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
        Schema::dropIfExists('particapte_campaigns');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadGenratesTable extends Migration
{
    //bfa_tot_status = [1 => Payment Required,2=>Payment send,3=>payment received,4=>paymnet not recevied]
    //media_comm_status = [0 => no action,1=>withdraw request send,2=>accept,3=>reject,4 => com received ,5=>commision not received]
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_genrates', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('lead_id');
            $table->bigInteger('participation_id')->unsigned();
            $table->foreign('participation_id')->references('id')->on('particapte_campaigns')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('ad_id')->unsigned();
            $table->foreign('ad_id')->references('id')->on('adsections')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('business_user_id')->unsigned();
            $table->foreign('business_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('media_user_id')->unsigned();
            $table->foreign('media_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->float('total_amount');
            $table->float('bfa_commission_owned');
            $table->float('media_commission_owned');
            $table->tinyInteger('media_comm_status')->default(0);
            $table->tinyInteger('bfa_tot_status')->default(1);
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
        Schema::dropIfExists('lead_genrates');
    }
}

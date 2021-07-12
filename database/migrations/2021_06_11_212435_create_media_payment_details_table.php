<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_payment_details', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->enum('type',['bank','paypal','contact_person']);
            $table->string('bank_name')->nullable();
            $table->Longtext('bank_address')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_title')->nullable();
            $table->string('routing_no')->nullable();
            $table->Biginteger('paypal_user_id')->nullable();
            $table->string('paypal_venmo')->nullable();
            $table->string('paypal_user_mail')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_title')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('media_payment_details');
    }
}

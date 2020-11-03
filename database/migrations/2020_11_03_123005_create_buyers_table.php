<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id('id');
            $table->string('buyer_name');
            $table->integer('buyer_id');
            $table->string('valid_id');
            $table->string('date_of_birth');
            $table->string('state_of_origin');
            $table->string('image');
            $table->string('phone_one');
            $table->string('phone_two')->nullable();
            $table->text('email');
            $table->text('passport')->nullable();
            $table->string('state');
            $table->string('lga');
            $table->string('country');
            $table->string('marital_status');
            $table->text('occupation');
            $table->text('company_name');
            $table->text('company_address');
            $table->text('address');
            $table->string('guarantor_name');
            $table->string('guarantor_valid_id')->nullable();
            $table->dateTime('guarantor_date_of_birth');
            $table->string('guarantor_image');
            $table->string('guarantor_phone_one');
            $table->string('guarantor_phone_two')->nullable();
            $table->string('guarantor_email');
            $table->string('guarantor_lga');
            $table->string('guarantor_occupation');
            $table->string('guarantor_marital_status');
            $table->text('guarantor_address')->nullable();
            $table->string('guarantor_state_of_origin')->nullable();
            $table->string('guarantor_country');
            $table->dateTime('date_registered');
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
        Schema::dropIfExists('buyers');
    }
}

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

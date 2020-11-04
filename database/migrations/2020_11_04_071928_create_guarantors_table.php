<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id('id');
            $table->integer('buyer_id');
            $table->string('name');
            $table->string('valid_id')->nullable();
            $table->dateTime('date_of_birth');
            $table->string('image');
            $table->string('phone_one');
            $table->string('phone_two')->nullable();
            $table->string('email');
            $table->string('lga');
            $table->string('occupation');
            $table->string('marital_status');
            $table->text('address')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('country');
            $table->dateTime('date_registered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guarantors');
    }
}

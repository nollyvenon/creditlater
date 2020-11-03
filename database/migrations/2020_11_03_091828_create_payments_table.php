<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('buyer_id');
            $table->string('buyer');
            $table->string('dispatcher')->nullable();
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('installment_amount');
            $table->integer('first')->nullable();
            $table->integer('second')->nullable();
            $table->integer('third')->nullable();
            $table->integer('fourth')->nullable();
            $table->integer('fifth')->nullable();
            $table->integer('sixth')->nullable();
            $table->dateTime('first_date_payed')->nullable();
            $table->dateTime('second_date_payed')->nullable();
            $table->dateTime('third_date_payed')->nullable();
            $table->dateTime('fourth_date_payed')->nullable();
            $table->dateTime('fifth_date_payed')->nullable();
            $table->dateTime('sixth_date_payed')->nullable();
            $table->boolean('return')->default('0');
            $table->boolean('delivered')->default('0');
            $table->dateTime('date_supplied')->nullable();
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
        Schema::dropIfExists('payments');
    }
}

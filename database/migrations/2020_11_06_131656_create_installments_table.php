<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;


class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id('id');
            $table->string('installment_user_id');
            $table->string('reference');
            $table->string('unique_key');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('state');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
            $table->string('shipping');
            $table->integer('total_price');
            $table->integer('installment');
            $table->integer('installment_count');
            $table->integer('initial_payment');
            $table->integer('balance');
            $table->boolean('is_complete')->default('0');
            $table->boolean('is_delivered')->default('0');
            $table->dateTime('paid_date')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('date_delivered')->nullable();
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
        Schema::dropIfExists('installments');
    }
}

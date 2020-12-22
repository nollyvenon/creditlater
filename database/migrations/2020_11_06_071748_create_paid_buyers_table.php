<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;
$date = date("Y-m-d H:s:i");


class CreatePaidBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_buyers', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_id');
            $table->string('reference');
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
            $table->integer('amount');
            $table->boolean('is_delivered')->default('0');
            $table->dateTime('paid_date')->default($date);
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
        Schema::dropIfExists('paid_buyers');
    }
}

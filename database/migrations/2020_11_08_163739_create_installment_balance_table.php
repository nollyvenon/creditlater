<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateInstallmentBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_balance', function (Blueprint $table) {
            $table->id('id');
            $table->integer('balance_user_id');
            $table->string('balance_reference');
            $table->string('balance_unique_key');
            $table->integer('balance_total_price');
            $table->integer('balance_paid');
            $table->integer('balance_balance');
            $table->dateTime('balance_paid_date')->default(Carbon::now()->toDateTimeString());
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
        Schema::dropIfExists('installment_balance');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;


class CreatePaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paids', function (Blueprint $table) {
            $table->id('id');
            $table->integer('buyer_user_id');
            $table->integer('product_id');
            $table->string('reference_number');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('small');
            $table->string('medium');
            $table->string('large');
            $table->string('xtra_large');
            $table->string('unspecified');
            $table->dateTime('paid_date')->default(Carbon::now()->toDateTimeString());
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
        Schema::dropIfExists('paids');
    }
}

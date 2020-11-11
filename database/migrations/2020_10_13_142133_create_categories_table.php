<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id("id");
            $table->string("category_name");
            $table->text('category_image')->nullable();
            $table->text('round_cat_image')->nullable();
            $table->dateTime('date_added')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('last_modified')->nullable();
            $table->boolean("is_feature")->default('0');
            $table->boolean("is_approved")->default('0');
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
        Schema::dropIfExists('categories');
    }
}

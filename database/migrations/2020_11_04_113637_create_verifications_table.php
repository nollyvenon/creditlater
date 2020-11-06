<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->dateTime('date_of_birth');
            $table->string('national_id');
            $table->string('status');
            $table->string('occupation');
            $table->text('proof_of_employment');
            $table->text('supporting_documents')->nullable();
            $table->string('address');
            $table->string('guarantor_first_name');
            $table->string('guarantor_last_name');
            $table->string('guarantor_phone');
            $table->dateTime('guarantor_date_of_birth');
            $table->string('guarantor_national_id');
            $table->string('guarantor_status');
            $table->string('guarantor_occupation');
            $table->string('guarantor_relationship');
            $table->string('guarantor_address');
            $table->dateTime('date_registered')->default(Carbon::now());
            $table->boolean('is_approved')->default('0');
            $table->dateTime('date_approved')->nullable();
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
        Schema::dropIfExists('verifications');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payer_id')->nullable();
            $table->string('business_name')->nullable();
            $table->string('address')->nullable();
            $table->string('nature')->nullable();
            $table->string('ownership')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('owners_address')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('file_no');
            $table->string('horc_no')->nullable();
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
        Schema::dropIfExists('horcs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payer_id')->nullable();
            $table->string('fileNo');
            $table->string('Date')->nullable();
            $table->string('column1')->nullable();
            $table->string('natOfBus')->nullable();
            $table->string('propLocation')->nullable();
            $table->string('value')->nullable();
            $table->string('assignor')->nullable();
            $table->string('column2')->nullable();
            $table->string('address1')->nullable();
            $table->string('assignee')->nullable();
            $table->string('column3')->nullable();
            $table->string('address2')->nullable();
            $table->string('cgt')->nullable();
            $table->string('assignorPay')->nullable();
            $table->string('assigneePay')->nullable();
            $table->string('borrowers')->nullable();
            $table->string('stampDuty')->nullable();
            $table->string('premises')->nullable();
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
        Schema::dropIfExists('lands');
    }
}

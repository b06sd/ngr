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
            $table->string('fileNo');
            $table->string('Date');
            $table->string('column1');
            $table->string('natOfBus');
            $table->string('propLocation');
            $table->string('value');
            $table->string('assignor');
            $table->string('column2');
            $table->string('address1');
            $table->string('assignee');
            $table->string('column3');
            $table->string('address2');
            $table->string('cgt');
            $table->string('assignorPay');
            $table->string('assigneePay');
            $table->string('borrowers');
            $table->string('stampDuty');
            $table->string('premises');
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

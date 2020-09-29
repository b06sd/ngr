<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalPlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_plannings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payer_id')->nullable();
            $table->string('file_no');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('dev_location')->nullable();
            $table->string('development_type')->nullable();
            $table->integer('structure_count')->nullable();
            $table->integer('floor_count')->nullable();
            $table->string('clearance')->nullable();
            $table->string('date_sent_out')->nullable();
            $table->decimal('assessment')->nullable();
            $table->string('assessment_type')->nullable();
            $table->decimal('amount_paid')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('date_paid')->nullable();
            $table->string('process_in_date')->nullable();
            $table->string('process_out_date')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('filings');
    }
}

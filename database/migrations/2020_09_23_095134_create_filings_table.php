<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_no');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('dev_location')->nullable();
            $table->string('development_type')->nullable();
            $table->integer('structure_count')->nullable();
            $table->integer('floor_count')->nullable();
            $table->string('clearance')->nullable();
            $table->date('date_sent_out')->nullable();
            $table->decimal('assessment')->nullable();
            $table->enum('assessment_type', ['PAYE', 'RETIREE', 'OTHER'])->nullable();
            $table->decimal('amount_paid')->nullable();
            $table->string('receipt_number')->nullable();
            $table->date('date_paid')->nullable();
            $table->date('process_in_date')->nullable();
            $table->date('process_out_date')->nullable();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabratoryRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labratory_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->nullable();
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');
            $table->integer('labratory_id')->unsigned()->nullable();
            $table->foreign('labratory_id')
                ->references('id')
                ->on('labratories');
            $table->date('outpot');
            $table->date('inpot')->nullable();
            $table->integer('teeth_number');
            $table->string('color');
            $table->string('type');
            $table->bigInteger('price');
            $table->bigInteger('paid_amount');
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
        Schema::dropIfExists('labratory_records');
    }
}

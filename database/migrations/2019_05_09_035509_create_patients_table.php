<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_name');
            $table->string('patient_fname');
            $table->integer('phone_number');
            $table->string('address');
            $table->string('type_of_service');
            $table->string('OPD');
            $table->string('gender');
            $table->longText('remark');
            $table->string('type');
            $table->time('intime');
            $table->time('outtime');
            $table->date('date');
            $table->bigInteger('total_fee');
            $table->bigInteger('received_amount');
            $table->bigInteger('loan_amount');
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
        Schema::dropIfExists('patients');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratory_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('labratory_id')->unsigned()->nullable();
            $table->foreign('labratory_id')
                ->references('id')
                ->on('labratories');
            $table->bigInteger('loan_amount');
            $table->bigInteger('pay_amount');
            $table->bigInteger('new_loan_amount');
            $table->date('date');
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
        Schema::dropIfExists('laboratory_payments');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDialyExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialy_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')
                ->references('id')
                ->on('staff');
            $table->integer('amount');
            $table->longText('remark');
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
        Schema::dropIfExists('dialy_expenses');
    }
}

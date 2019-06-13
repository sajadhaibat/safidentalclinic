<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')
                ->references('id')
                ->on('staff');
            $table->bigInteger('amount');
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
        Schema::dropIfExists('advance_moneys');
    }
}

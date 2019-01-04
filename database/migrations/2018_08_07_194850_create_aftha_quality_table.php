<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfthaQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aftha_quality', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('QA_id')->unsigned();
            $table->integer('Q1')->unsigned();
            $table->integer('Q2')->unsigned();
            $table->integer('Q3')->unsigned();
            $table->integer('Q4')->unsigned();
            $table->integer('Q5')->unsigned();
            $table->integer('Q6')->unsigned();
            $table->string('C1',190)->nullable();
            $table->string('C2',190)->nullable();
            $table->string('C3',190)->nullable();
            $table->string('C4',190)->nullable();
            $table->string('C5',190)->nullable();
            $table->string('C6',190)->nullable();
            $table->float('score',8,2);

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
        Schema::dropIfExists('aftha_quality');
    }
}

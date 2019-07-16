<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSzertexingtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('szertexingtons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('QA_id')->unsigned();
            $table->string('phone',190)->nullable();
            $table->string('audio',200)->nullable();
            $table->integer('Q1')->unsigned();
            $table->integer('Q2')->unsigned();
            $table->integer('Q3')->unsigned();
            $table->integer('Q4')->unsigned();
            $table->integer('Q5')->unsigned();
            $table->integer('Q6')->unsigned();
            $table->integer('Q7')->unsigned();
            $table->integer('Q8')->unsigned();

            $table->string('C1',190)->nullable();
            $table->string('C2',190)->nullable();
            $table->string('C3',190)->nullable();
            $table->string('C4',190)->nullable();
            $table->string('C5',190)->nullable();
            $table->string('C6',190)->nullable();
            $table->string('C7',190)->nullable();
            $table->string('C8',190)->nullable();
            $table->float('score',8,2);
            $table->float('weekly_score',8,2);
            $table->longText('final_comment')->nullable();
            $table->tinyInteger('acknowledge')->default(0);

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
        Schema::dropIfExists('szertexingtons');
    }
}

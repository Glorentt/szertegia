<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowslingersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showslingers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('QA_id')->unsigned();
            $table->integer('Q1')->unsigned();
            $table->integer('Q2')->unsigned();
            $table->integer('Q3')->unsigned();
            $table->integer('Q4')->unsigned();
            $table->integer('Q5')->unsigned();
            $table->integer('Q6')->unsigned();
            $table->integer('Q7')->unsigned();
            $table->integer('Q8')->unsigned();
            $table->integer('Q9')->unsigned();
            $table->integer('Q10')->unsigned();
            $table->integer('Q11')->unsigned();
            $table->integer('Q12')->unsigned();
            $table->integer('Q13')->unsigned();
            $table->integer('Q14')->unsigned();
            $table->integer('Q15')->unsigned();
            $table->integer('Q16')->unsigned();
            $table->integer('Q17')->unsigned();
            $table->integer('Q18')->unsigned();
            $table->string('C1',199);
            $table->string('C2',199);
            $table->string('C3',199);
            $table->string('C4',199);
            $table->string('C5',199);
            $table->string('C6',199);
            $table->string('C7',199);
            $table->string('C8',199);
            $table->string('C9',199);
            $table->string('C10',199);
            $table->string('C11',199);
            $table->string('C12',199);
            $table->string('C13',199);
            $table->string('C14',199);
            $table->string('C15',199);
            $table->string('C16',199);
            $table->string('C17',199);
            $table->string('C18',199);
            $table->longText('FC');
            $table->float('score',8,2);
            $table->float('weeklyscore',8,2);
            
            

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
        Schema::dropIfExists('showslingers');
    }
}

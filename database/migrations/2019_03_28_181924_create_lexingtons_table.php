<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLexingtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lexingtons', function (Blueprint $table) {
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
          $table->integer('Q9')->unsigned();
          $table->integer('Q10')->unsigned();
          $table->integer('Q11')->unsigned();
          $table->integer('Q12')->unsigned();
          $table->integer('Q13')->unsigned();
          $table->integer('Q14')->unsigned();
          $table->integer('Q15')->unsigned();
          $table->integer('Q16')->unsigned();
          
          

          $table->string('C1',190)->nullable();
          $table->string('C2',190)->nullable();
          $table->string('C3',190)->nullable();
          $table->string('C4',190)->nullable();
          $table->string('C5',190)->nullable();
          $table->string('C6',190)->nullable();
          $table->string('C7',190)->nullable();
          $table->string('C8',190)->nullable();
          $table->string('C9',190)->nullable();
          $table->string('C10',190)->nullable();
          $table->string('C11',190)->nullable();
          $table->string('C12',190)->nullable();
          $table->string('C13',190)->nullable();
          $table->string('C14',190)->nullable();
          $table->string('C15',190)->nullable();
          $table->string('C16',190)->nullable();
        
          $table->float('score',8,2);
          $table->float('weekly_score',8,2)->default('0.00');
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
        Schema::dropIfExists('lexingtons');
    }
}

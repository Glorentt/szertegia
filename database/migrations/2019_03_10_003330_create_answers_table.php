<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('answer_name')->nullable();
            $table->integer('type_answer_id')->unsigned();
            $table->longText('correct_answer')->nullable();
            $table->integer('score_answer')->unsigned();
            $table->longText('campaing_id')->nullable();
            $table->integer('question_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('status_id')->unsigned();
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
        Schema::dropIfExists('answers');
    }
}

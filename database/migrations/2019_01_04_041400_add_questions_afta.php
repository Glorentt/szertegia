<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionsAfta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aftha_qualities', function (Blueprint $table) {
            $table->integer('Q12')->unsigned()->after('Q11');
            $table->integer('Q13')->unsigned()->after('Q12');
            $table->integer('Q14')->unsigned()->after('Q13');
            $table->integer('Q15')->unsigned()->after('Q14');
            $table->integer('Q16')->unsigned()->after('Q15');
            $table->integer('Q17')->unsigned()->after('Q16');
            $table->integer('Q18')->unsigned()->after('Q17');
            $table->integer('Q19')->unsigned()->after('Q18');
            $table->integer('Q20')->unsigned()->after('Q19');

            $table->string('C12',190)->nullable()->after('C11');
            $table->string('C13',190)->nullable()->after('C12');
            $table->string('C14',190)->nullable()->after('C13');
            $table->string('C15',190)->nullable()->after('C14');
            $table->string('C16',190)->nullable()->after('C15');
            $table->string('C17',190)->nullable()->after('C16');
            $table->string('C18',190)->nullable()->after('C17');
            $table->string('C19',190)->nullable()->after('C18');
            $table->string('C20',190)->nullable()->after('C19');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aftha_qualities', function (Blueprint $table) {
            //
        });
    }
}

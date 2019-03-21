<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call('UserTableSeeder');
        $this->call('SubjectTableSeeder');
        $this->call('ExamTableSeeder');
        $this->call('QuestionTableSeeder');
        $this->call('AnswerTableSeeder');
        $this->call('MarkTableSeeder');
    }

}

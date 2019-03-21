<?php

/**
 * Created by PhpStorm.
 * User: mitaka
 * Date: 2/2/2016
 * Time: 7:08 PM
 */
class QuestionTableSeeder extends Seeder
{
    public function run()
    {
        Question::create([
            'question_name' => '2+3 = ?',
            'user_id' => '2',
            'exam_id' => '1',
        ]);
        Question::create([
            'question_name' => '3+4 = ?',
            'user_id' => '2',
            'exam_id' => '1',
        ]);
        Question::create([
            'question_name' => '2+2 = ?',
            'user_id' => '2',
            'exam_id' => '1',
        ]);
        Question::create([
            'question_name' => 'Is it easy ? (2 correct answers)',
            'user_id' => '2',
            'exam_id' => '1',
        ]);
        Question::create([
            'question_name' => '3+3*3 = ?',
            'user_id' => '2',
            'exam_id' => '1',
        ]);

        Question::create([
            'question_name' => 'What does PHP stand for?',
            'user_id' => '2',
            'exam_id' => '2',
        ]);
        Question::create([
            'question_name' => 'What is the correct way to add 1 to the $count variable?',
            'user_id' => '2',
            'exam_id' => '2',
        ]);
        Question::create([
            'question_name' => 'How do you write "Hello World" in PHP?',
            'user_id' => '2',
            'exam_id' => '2',
        ]);
        Question::create([
            'question_name' => 'All variables in PHP start with which symbol?',
            'user_id' => '2',
            'exam_id' => '2',
        ]);
        Question::create([
            'question_name' => 'When using the POST method, variables are displayed in the URL?',
            'user_id' => '2',
            'exam_id' => '2',
        ]);

    }
}
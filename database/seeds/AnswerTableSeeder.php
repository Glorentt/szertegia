<?php

/**
 * Created by PhpStorm.
 * User: mitaka
 * Date: 2/2/2016
 * Time: 7:08 PM
 */
class AnswerTableSeeder extends Seeder
{
    public function run()
    {
        //question1
        Answer::create([
            'answer_name' => '5',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '1',
            'question_id' => '1'
        ]);
        Answer::create([
            'answer_name' => '4',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '1'
        ]);
        Answer::create([
            'answer_name' => '6',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '1'
        ]);
        Answer::create([
            'answer_name' => 'None of above',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '1'
        ]);

        //question2
        Answer::create([
            'answer_name' => '11',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '2'
        ]);
        Answer::create([
            'answer_name' => '9',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '2'
        ]);
        Answer::create([
            'answer_name' => '7',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '1',
            'question_id' => '2'
        ]);

        //question3
        Answer::create([
            'answer_name' => '5',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '3'
        ]);
        Answer::create([
            'answer_name' => '3',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '3'
        ]);
        Answer::create([
            'answer_name' => '4',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '1',
            'question_id' => '3'
        ]);
        Answer::create([
            'answer_name' => 'None of above',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '3'
        ]);

        //question4
        Answer::create([
            'answer_name' => 'YES IT IS',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '1',
            'question_id' => '4'
        ]);
        Answer::create([
            'answer_name' => 'I dont understant',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '4'
        ]);
        Answer::create([
            'answer_name' => 'YES IT IS!',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '1',
            'question_id' => '4'
        ]);
        Answer::create([
            'answer_name' => '7',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '4'
        ]);

        //question5
        Answer::create([
            'answer_name' => '9',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '5'
        ]);
        Answer::create([
            'answer_name' => '12',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '1',
            'question_id' => '5'
        ]);
        Answer::create([
            'answer_name' => '27',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '5'
        ]);
        Answer::create([
            'answer_name' => 'None of above',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '1',
            'question_id' => '5'
        ]);


        //question1
        Answer::create([
            'answer_name' => 'PHP: Hypertext Preprocessor',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '2',
            'question_id' => '6'
        ]);
        Answer::create([
            'answer_name' => 'Private Home Page',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '6'
        ]);
        Answer::create([
            'answer_name' => 'Personal Hypertext Processor',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '6'
        ]);

        //question2
        Answer::create([
            'answer_name' => '++count',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '7'
        ]);
        Answer::create([
            'answer_name' => '$count=+1',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '7'
        ]);
        Answer::create([
            'answer_name' => 'count++;',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '7'
        ]);
        Answer::create([
            'answer_name' => '$count++;',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '2',
            'question_id' => '7'
        ]);

        Answer::create([
            'answer_name' => 'None of above',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '7'
        ]);

        //question3
        Answer::create([
            'answer_name' => '"Hello World";',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '8'
        ]);
        Answer::create([
            'answer_name' => 'echo "Hello World";',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '2',
            'question_id' => '8'
        ]);
        Answer::create([
            'answer_name' => 'Document.Write("Hello World");',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '8'
        ]);

        //question4
        Answer::create([
            'answer_name' => '$',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '2',
            'question_id' => '9'
        ]);
        Answer::create([
            'answer_name' => '!',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '9'
        ]);
        Answer::create([
            'answer_name' => '&',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '9'
        ]);

        //question5
        Answer::create([
            'answer_name' => 'true',
            'user_id' => '2',
            'correct_answer' => 'false',
            'exam_id' => '2',
            'question_id' => '10'
        ]);
        Answer::create([
            'answer_name' => 'false',
            'user_id' => '2',
            'correct_answer' => 'true',
            'exam_id' => '2',
            'question_id' => '10'
        ]);


    }
}
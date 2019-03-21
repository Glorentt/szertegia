<?php

/**
 * Created by PhpStorm.
 * User: mitaka
 * Date: 2/2/2016
 * Time: 7:08 PM
 */
class ExamTableSeeder extends Seeder
{
    public function run()
    {
        Exam::create([
            'exam_name' => 'Introduction to the simple numbers',
            'exam_time' => '5',
            'questions_count' => '5',
            'time_per_question' => '1',
            'teacher_id' => '2',
            'subject_id' => '2',
        ]);

        Exam::create([
            'exam_name' => 'PHP Basics',
            'exam_time' => '5',
            'questions_count' => '5',
            'time_per_question' => '1',
            'teacher_id' => '2',
            'subject_id' => '1',
        ]);

    }
}
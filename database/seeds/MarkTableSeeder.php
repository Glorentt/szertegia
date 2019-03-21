<?php

/**
 * Created by PhpStorm.
 * User: mitaka
 * Date: 2/2/2016
 * Time: 7:05 PM
 */
class MarkTableSeeder extends Seeder
{
    public function run()
    {
        Mark::create([
            'mark'=>'4',
            'user_id'=>'3',
            'exam_id'=>'2',
        ]);

    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer_name','type_answer_id','correct_answer','score_answer',
        'campaing_id','question_id','user_id','status_id'
    ];
    //'created_at','updated_at'
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aftha_quality extends Model
{
    protected $fillable = [
        'C1','user_id','QA_id','Q1','Q2','Q3','Q4','Q5','Q6','Q7','C1','C2','C3','C4','C5',
        'C6','C7','score','final_comment','weekly_score','audio','phone','acknowledge',
    ];
}

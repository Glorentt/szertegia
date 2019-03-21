<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homeowners extends Model
{
    protected $fillable = [
        'user_id','nameSupervisor','dateToday','QA_id','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10',
        'score','final_comment','weekly_score','audio','audioTwo','phone','acknowledge',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showslinger extends Model
{
    protected $fillable = [
        'user_id','QA_id','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12','Q13',
        'Q14','Q15','Q16','Q17','C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11'
    , 'C12','C13','C14','C15','C16','C17','score','weekly_score','audio','phone',
    ];
}

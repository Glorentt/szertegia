<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bizwell extends Model
{
  protected $fillable = [
      'user_id','QA_id','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10',
      'Q11','Q12','Q13','Q14','Q15','Q16','Q17','Q18',
      'score','final_comment','weekly_score','audio','phone','acknowledge',
  ];

}

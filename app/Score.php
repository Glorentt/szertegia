<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'id','question_id', 'form_id','score','user_id','acknowledge'
    ];
}

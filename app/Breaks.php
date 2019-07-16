<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breaks extends Model
{
    protected $fillable = [
        'user_id','start_break','end_break','comment'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'form_name','user_id'
    ];
    //'created_at','updated_at'
}

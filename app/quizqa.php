<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quizqa extends Model
{
    protected $fillable = ['name', 'avatar'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

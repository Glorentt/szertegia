<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    private static $instance = null;
    protected $fillable = [
        'user_id','start','start_break','end_break','comment','out'
    ];

    private function __contruct(){
        
    }
    public static function getInstance()
    {
        if (self::$instance == null){
            self::$instance = new Time();
        }
         return self::$instance;
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id','sale',
    ];

    private static $instance = null;
    private function __contruct(){

    }
    public static function getInstance(){
        if(self::$instance== null){
            self::$instance = new Sale();
        }
        return self::$instance;
    }
}

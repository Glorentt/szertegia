<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingletonSalesQualifierController extends Controller
{
    private static $instance = null;
    private function __construct(){

    }

    public static function getInstance(){
        if(self::$instance== null){
            self::$instance = new SingletonSalesQualifierController();
        }
        return self::$instance;
    }
}

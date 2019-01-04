<?php

namespace App\Http\Controllers\qa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class scoreController extends Controller
{
    public function index(){
        return view('qa.aftha_scores');
    }
}

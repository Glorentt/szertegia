<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class scoreController extends Controller
{
    public function index(){
        return view('agent.aftha_scores');
    }
    public function showslinger_scores(){
        return view('agent.showslinger_scores');
    }
    Public function casemanagers_scores(){
        return view('agent.scores_case_manager');
    }
    Public function forex_scores(){
        return view('agent.scores_forex');
    }
    Public function homeowners_scores(){
        return view('agent.scores_homeowners');
    }
}
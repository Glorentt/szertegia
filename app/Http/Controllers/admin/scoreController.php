<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class scoreController extends Controller
{
    public function index(){
        return view('admin.aftha_scores');
    }
    public function showslinger_scores(){
        return view('admin.showslinger_scores');
    }
    Public function casemanagers_scores(){
        return view('admin.scores_case_manager');
    }
    Public function forex_scores(){
        return view('admin.scores_forex');
    }
    Public function homeowners_scores(){
        return view('admin.scores_homeowners');
    }
    Public function lexington_scores(){
        return view('admin.scores_lexington');
    }
    Public function Szertexington_scores(){
        return view('admin.Szertexington.scores_Szertexington');
    }
}

<?php

namespace App\Http\Controllers\admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index(){
        $sales= DB::table('users')
        ->leftJoin('sales','users.id','=','sales.user_id')
        ->select('users.name as name','sales.sale as sales', 'users.id as id')
        ->orderBy('sales','desc')
        ->get();
        return view('admin.sales.index',compact('sales'));
    }
}

<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Sale;

class QualifierSalesController extends Controller
{
    public function index(){
        $sales = DB::table('sales')
                   ->select('user_id', DB::raw("sum(IF(sale IS NULL, 0, 1)) as sales"))
                   ->whereBetween('sales.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                   ->groupBy('user_id');


        $users= DB::table('users')
        ->leftJoinSub($sales,'sales', function($join){
            $join->on('users.id','=','sales.user_id');
        })
        ->select('id','name','sales.sales as sales')
        ->where('campaign','=','qualifier')
        ->orderBy('sales','desc')
        ->get();

        return view('agent.sales.qualifier.index',compact('users'));
    }
}

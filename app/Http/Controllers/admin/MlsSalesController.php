<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Sale;

class MlsSalesController extends Controller
{
    public function index() {
        $sales = DB::table('sales')
        ->select('user_id', DB::raw("sum(IF(sale IS NULL, 0, 1)) as sales"))
                ->whereBetween('sales.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->groupBy('user_id');

        $users = DB::table('users')
        ->leftJoinSub($sales, 'sales', function($join){
            $join->on('users.id','=','sales.user_id');
        })
        ->select('id', 'name', 'sales.sales as sales' )
        ->where('campaign', '=', 'mls' )
        ->get();
        
        return view('admin.sales.mls.index', compact('users'));
    }
    public function add(Request $request){
        $sale = Sale::getInstance();
        $sale->sale = "1";
        $sale->user_id = $request->id;
        $sale->save();
        return redirect()->route('admin.sales.mls')->with('success','Guardado');
    }
    public function minus(Request $request){
        $sale= Sale::where('user_id','=',$request->id)->orderBy('created_at', 'desc')->first();
        if ( $sale->delete()) {
            return redirect()->route('admin.sales.mls')->with('success','Borrado');
        }else{
            return redirect()->route('admin.sales.mls')->with('error','hay pedo');
        }
    }

    public function report($date = null){
       
    }
}

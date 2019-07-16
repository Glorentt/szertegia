<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Time;
use App\Breaks;
use Carbon\Carbon;
use DB;


class TracktimeController extends Controller
{
    public $mytime;
    public $minusBreak;
    public function index(){




        $times = DB::table('times')->select("user_id","start","out")
        ->where('user_id',\Session('id'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get();

        // brakes
        // var_dump($times);

        $this->mytime = "00:00:00";
            foreach($times as $time){
                $timeSplited = explode(":",$time->start);
                $checkTime = strtotime($time->start);
                $outTime = strtotime($time->out);
                $diff = $outTime - $checkTime;

                $hours = sprintf("%02d", floor($diff / 3600));
                $mins = sprintf("%02d", floor($diff / 60 % 60));
                $secs = sprintf("%02d", floor($diff % 60));
                $tiempo = $hours.":".$mins.":".$secs;
                $tiempo = date("H:i:s",strtotime($tiempo)); 
                $this->mytime = date("H:i:s",strtotime($this->mytime));
                

                $str_time = $this->mytime;

                $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

                sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds); //comvertimos el formato

                $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;
              
                $suma = $time_seconds + $diff;//suumamos la diferencia
                $hours = sprintf("%02d", floor($suma / 3600));
                $mins = sprintf("%02d", floor($suma / 60 % 60));
                $secs = sprintf("%02d", floor($suma % 60));
                $this->mytime = $hours.":".$mins.":".$secs;
                // echo $this->mytime;
            }
        

        return view('agent.tracktime')->with('mytime',$this->mytime);
    }

    public function store(Request $request){
        $user = Time::whereDate('created_at','=', Carbon::today())
            ->where('user_id','=',$request->id)
            ->orderBy('created_at','desc')
            ->first();
     
        if($user == null){
            $time = Time::getInstance();
            $time->user_id = $request->id;
            $time->start = $request->active;
            $time->out = $request->active;
            $time->save();
            return "saved";
        }else{
            $user->update(['out'=>$request->active]);
            return "updated";
        }
    }
    public function break(Request $request){

        $breaks = DB::table('breaks')->select("user_id","start_break","end_break")
        ->where('user_id',\Session('id'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get();
        $this->minusBreak = "00:00:00";
        if($breaks != null){
            foreach($breaks as $break){

            }
        }
        

        // DB::table('users')->insert(
        //     ['email' => 'john@example.com', 'votes' => 0]
        // );
    }


    public function startbreak(){
        $breaks = DB::table('breaks')->select("user_id","start_break","end_break")
        ->where('user_id',\Session('id'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get();
        $this->minusBreak = "00:00:00";
        if($breaks != null){
            foreach($breaks as $break){

            }
        }
    }
    public function endBreak(){
        $user = DB::table('breaks')
            ->whereDate('created_at','=', Carbon::today())
            ->where('user_id','=',$request->id)
            ->whereNotNull('start_break')

            ->orderBy('created_at','desc')
            ->first();
    }

}

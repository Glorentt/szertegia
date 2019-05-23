<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Time;
use Carbon\Carbon;
use DB;


class TracktimeController extends Controller
{
    public $mytime;
    public function index(){
        $times = DB::table('times')->select("user_id","start","out")
        ->where('user_id',\Session('id'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get();
        // var_dump($times);
        $this->mytime = "00:00:00";
            foreach($times as $time){
                $timeSplited = explode(":",$time->start);
                //definir fecha en 2 digitos

                echo "time: ".$time->start."<br> ";
                echo "out: ".$time->out."<br> ";
                // $startHours = sprintf("%02d", $timeSplited[0]);
                // $startMinutes = sprintf("%02d", $timeSplited[1]) ;
                // $startSeconds = sprintf("%02d", $timeSplited[2]);

                // $timeSplited = explode(":",$time->out);
            
                // $outHours = sprintf("%02d", $timeSplited[0]);
                // $outMinutes = sprintf("%02d", $timeSplited[1]);
                // $outSeconds = sprintf("%02d", $timeSplited[2]);
                // $outTime = $outHours.":".$outMinutes.":".$outSeconds;
                // $startTime = $startHours.":".$startMinutes.":".$startSeconds;
                $checkTime = strtotime($time->start);
                $outTime = strtotime($time->out);
                $diff = $outTime - $checkTime;
                echo "diferencia :" .$diff."<br>";
                // hasta aqui tengo la diferencia en segundos entre tiempo de entrada y salida
                $hours = sprintf("%02d", floor($diff / 3600));
                $mins = sprintf("%02d", floor($diff / 60 % 60));
                $secs = sprintf("%02d", floor($diff % 60));
                $tiempo = $hours.":".$mins.":".$secs;
                $tiempo = date("H:i:s",strtotime($tiempo)); 
                echo "total FORMATEADO:" .$tiempo."<br>";
                $this->mytime = date("H:i:s",strtotime($this->mytime));
                

                $str_time = $this->mytime;

                $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

                sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

                $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;
                echo "time en SECONDS: ".$time_seconds."<br>";

                echo "sumando ".$time_seconds." + ".$diff;
                $suma = $time_seconds + $diff;
                echo "<p style='color:red'>Sumatoria: ".$suma."</p><br><br>";

                // $this->mytime =  + strtotime($tiempo);
                // echo "total2:    " .$this->mytime."<br>";
                $hours = sprintf("%02d", floor($suma / 3600));
                $mins = sprintf("%02d", floor($suma / 60 % 60));
                $secs = sprintf("%02d", floor($suma % 60));
                 $this->mytime = $hours.":".$mins.":".$secs;
                
            }
        

        // return view('agent.tracktime',concat('mytime'));
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
        $user = DB::table('breaks')
            ->whereDate('created_at','=', Carbon::today())
            ->where('user_id','=',$request->id)
            ->orderBy('created_at','desc')
            ->first();
        
        if($user ==  null){
            DB::table('breaks')->insert(
                ['start_break' => $request->start_break, 'comment' => $request->comment]
            );
            
        }

        DB::table('users')->insert(
            ['email' => 'john@example.com', 'votes' => 0]
        );
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

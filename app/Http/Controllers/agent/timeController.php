<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class timeController extends Controller
{

    public function getTimeConnection(){
        $curl = curl_init();
// Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "1800:1234@homeowners.vicihost.com/vicidial/AST_agent_performance_detail.php?DB=&query_date=2018-10-02&query_time=00%3A00%3A00&end_date=2018-10-06&end_time=23%3A59%3A59&group[]=--ALL--&user_group[]=Szertegia&users[]=--ALL--&breakdown_by_date=checked&report_display_type=TEXT&shift=--&SUBMIT=SUBMIT",
            // CURLOPT_URL => 'http://800:1234@homeowners.vicihost.com/vicidial/AST_agent_performance_detail.php?DB=&query_date=2018-10-01&query_time=00%3A00%3A00&end_date=2018-10-06&end_time=23%3A59%3A59&group%5B%5D=10&group%5B%5D=20&group%5B%5D=30&group%5B%5D=40&group%5B%5D=99999&user_group%5B%5D=Szertegia&users%5B%5D=--ALL--&breakdown_by_date=checked&report_display_type=HTML&shift=--&SUBMIT=SUBMIT',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
// Send the request & save response to $resp
        $resp = curl_exec($curl);
        $fh = fopen('time_connection.html', 'w') or die("can't open file");
                fwrite($fh, $resp);
                fclose($fh);
        // Close request to clear up some resources
        curl_close($curl);
    //    echo 'olis';

        $file = file_get_contents('time_connection.html', FILE_USE_INCLUDE_PATH);

        $header = explode('</TABLE>',$file);
        $table = explode('[DOWNLOAD]</a>',$header[2]);
        // echo $header[2];
        // echo $table[1];

        $fo =fopen('time.html', 'w') or die("can't open file");
        fwrite($fo,$header[2]);
        fwrite($fo,$table[1]);
        fclose($fo);

    }

    public function paysheet(){
      return view('agent.paysheet');
    }


    function show_time(){
        $time = '00:00:00';
        $timestamp = time();


        if(date('N', $timestamp) === '1') {
            $time = (6*60+40)/60;

        }elseif(date('N', $timestamp) === '2'){
            $time = (12*60+80)/60;

        }elseif(date('N', $timestamp) === '3'){
            $time = (18*60+120)/60;

        }elseif(date('N', $timestamp) === '4'){
            $time = (24*60+160)/60;

        }elseif(date('N', $timestamp) === '5'){
            $time = (30*60+200)/60;

        }elseif(date('N', $timestamp) === '6'){
            $time = (36*60+240)/60;

        }else{
            echo "no hay";
        }
        $totalHr = (int)$time;
        $totalMin =  fmod($time, 1) * 60;
        $totalTime = $totalHr.":".$totalMin;

        // echo sprintf('%02d:%02d', (int) $time, fmod($time, 1) * 60);
        // echo date('h:i:s', $must_have); '%02d:%02d',
         return view('time_connection')->with('time',$totalTime);
    }
}

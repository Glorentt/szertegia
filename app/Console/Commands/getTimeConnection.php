<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;

class getTimeConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TimeConnection:getTime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create file time.html in public folder to show users their time connection';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(date('D')!='Mon')
{    
 //take the last monday
  $staticstart = date('Y-m-d',strtotime('last Monday'));    

}else{
    $staticstart = date('Y-m-d');   
}

//always next saturday

if(date('D')!='Sat')
{
    $staticfinish = date('Y-m-d',strtotime('next Saturday'));
}else{

        $staticfinish = date('Y-m-d');
}
        $curl = curl_init();
// Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "800:1234@homeowners.vicihost.com/vicidial/AST_agent_performance_detail.php?DB=&query_date=".$staticstart."&query_time=00%3A00%3A00&end_date=".$staticfinish."&end_time=23%3A59%3A59&group[]=--ALL--&user_group[]=Szertegia&users[]=--ALL--&breakdown_by_date=checked&report_display_type=TEXT&shift=--&SUBMIT=SUBMIT",
            // CURLOPT_URL => 'http://800:1234@homeowners.vicihost.com/vicidial/AST_agent_performance_detail.php?DB=&query_date=2018-10-01&query_time=00%3A00%3A00&end_date=2018-10-06&end_time=23%3A59%3A59&group%5B%5D=10&group%5B%5D=20&group%5B%5D=30&group%5B%5D=40&group%5B%5D=99999&user_group%5B%5D=Szertegia&users%5B%5D=--ALL--&breakdown_by_date=checked&report_display_type=HTML&shift=--&SUBMIT=SUBMIT',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
// Send the request & save response to $resp
        $resp = curl_exec($curl);
$file_origin = public_path().'/time_connection.html';
        $fh = fopen($file_origin, 'w') or die("can't open file");
                fwrite($fh, $resp);
                fclose($fh);
        // Close request to clear up some resources
        curl_close($curl);
    //    echo 'olis';
        
        $file = file_get_contents($file_origin, FILE_USE_INCLUDE_PATH);
        
        $header = explode('</TABLE>',$file);
        $table = explode('[DOWNLOAD]</a>',$header[2]);
        // echo $header[2];
        // echo $table[1];
        $file_final = public_path().'/time.html';
        $fo =fopen($file_final, 'w') or die("can't open file");
        fwrite($fo,$header[2]);
        fwrite($fo,$table[1]);
        fclose($fo);
        Log::info($file_final);

        Log::info($staticstart);
        Log::info($staticfinish);
        Log::info("file time.html created correctly");
    }
}

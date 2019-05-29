<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prayer;
use App\Iqamah;

class PrayerController extends Controller
{
    public function manage_prayers()
    {
        $prayers = Prayer::get()->sortBy("id");
        // Get the current time prayers for the period
        $today = date("Y-m-d");
        $today = date_parse($today);
        $today =  $today['day']. "-".$today['month'];
        $current = Prayer::where('date', $today)->first(); 
        $iqamahs = Iqamah::get()->sortByDesc('date');


        // Get current iqamah time       
        $c_iqamah = ["fajr"=>"-",
        "duhr"=>"-",
        "asr"=>"-",
        "maghrib"=>"-",
        "isha"=>"-"
        ];    
        $count = 1;
        foreach($iqamahs as $iqamah){ 
            //Once the first date >   
            if(time() > strtotime($iqamah["date"])){
                if($count == 1){
                    $c_iqamah = $iqamah;                
                }else{
                    $c_iqamah = $p_iqamah;
                }                
                break;
            }
            $p_iqamah = $iqamah;
            $count++;           
        }
       
        return view('prayers.manage_prayers',['prayers'=>$prayers, 'current'=>$current, 'iqamahs'=>$iqamahs, 'current_iqamah'=>$c_iqamah]);
    }


    // Function for uploading prayer times from a flat file
    public function upload_prayer_times(Request $request){
        $request->validate([            
            'pfile' => 'required',                          
        ]);
        
        $file = $request->file('pfile');

        if ($file = fopen($file->getRealPath(), "r")) {           
            //Remove past prayer times
            if($request['remove_past_dates'] == "1"){
                $obsolete = [];
                $prayers = Prayer::get();
                foreach($prayers as $prayer){
                    if(strtotime($prayer['date']) <(time() - (60*60*24))){
                        array_push($obsolete, $prayer['id']);
                    }
                }
                // Delete the obsolete records
                if(count($obsolete)>0){
                    foreach($obsolete as $obs){
                        Prayer::find($obs)->delete();
                    }
                }
            }
            Prayer::truncate(); //Drop prayer table
            while(!feof($file)) {
                $line = fgets($file);
                if(preg_match('/date/', $line)){
                    continue;
                }else{
                    // trim the line from white spaces
                    $line = trim($line);
                    // get times                     
                    $times = explode(',',$line);

                    if($request['remove_past_dates'] == "1"){
                        if(strtotime($times[0]) < (time() - (60*60*24))){
                           continue;
                        }
                    }
                    if(count($times)==7){
                        $prayer = Prayer::where('date', $times[0])->first();
                        $exist = 1;
                        // Check if the date already exist
                        if (!$prayer) { 
                            $prayer = new Prayer;
                            $exist = 0;
                        }
                        
                        // store the informations  
                        $date = date_parse($times[0]);                       
                        $prayer->date = $date['day']. "-".$date['month'];
                        $prayer->fajr = $times[1];
                        $prayer->sunrise = $times[2];                       
                        $prayer->duhr =$times[3];
                        $prayer->asr = $times[4];
                        $prayer->maghrib = $times[5];
                        $prayer->isha = $times[6];                        

                        if($exist){
                            $prayer->update();
                        }else{
                            $prayer->save();
                        }                        
                    }                                   
                }                
            }
            fclose($file);            
        }
        
        return redirect('manage_prayers'); 
    }
    
}

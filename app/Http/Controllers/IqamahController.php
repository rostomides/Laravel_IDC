<?php

namespace App\Http\Controllers;

use App\Iqamah;
use App\Prayer;

use Illuminate\Http\Request;

class IqamahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


       
    public function store(Request $request)
    {
        $request->validate([            
            'date' => 'required|unique:prayers',
            'fajr'=>'required',
            'duhr'=> 'required',
            'asr'=>'required',
            'maghrib' => 'required',
            'isha'=> 'required'          
        ]);
        
        $iqamah = new Iqamah;
        $iqamah->date = $request['date'];        
        $iqamah->fajr = $request['fajr'];
        $iqamah->duhr = $request['duhr'];
        $iqamah->asr = $request['asr'];
        $iqamah->maghrib = $request['maghrib'];
        $iqamah->isha = $request['isha'];        
        $iqamah->save();          

        return redirect('manage_prayers');
    }


    function edit($id){

        $prayers = Prayer::get()->sortBy("date");
        // Get the current time prayers for the period
        $today = date("Y-m-d");
        $current = Prayer::where('date', $today)->first(); 
        $iqamahs = Iqamah::get();
        $iqamah = Iqamah::findOrFail($id); 
        
        

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

        return view("prayers.edit_prayer", ['iqamahs'=>$iqamahs, 'prayers'=>$prayers, 'current'=>$current, 'iqamah'=>$iqamah,
        'current_iqamah'=>$c_iqamah]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([            
            'date' => 'required',
            'fajr'=>'required',
            'duhr'=> 'required',
            'asr'=>'required',
            'maghrib' => 'required',
            'isha'=> 'required'          
        ]);
        
        $iqamah = Iqamah::findOrFail($id);
        $iqamah->date = $request['date'];        
        $iqamah->fajr = $request['fajr'];
        $iqamah->duhr = $request['duhr'];
        $iqamah->asr = $request['asr'];
        $iqamah->maghrib = $request['maghrib'];
        $iqamah->isha = $request['isha'];        
        $iqamah->update();          

        return redirect('manage_prayers');
    }




    function destroy($id){
        $iqamah = Iqamah::findOrFail($id);
        $iqamah->delete();
        return redirect('manage_prayers');
    }







    }

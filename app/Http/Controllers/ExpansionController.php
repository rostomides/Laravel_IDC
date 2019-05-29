<?php

namespace App\Http\Controllers;

use App\Expansion;
use Illuminate\Http\Request;

class ExpansionController extends Controller
{
        
    public function manageDonation(Expansion $expansion)
    {
        $exp = Expansion::findOrFail(1);
        
        return view('expansion.manage_donation', ['expansion'=>$exp]);
    }

    
    public function update(Request $request)
    {
        $request->validate([            
            'total_cost' => 'required',//specify the table name in the database for unique validation
            'current_donation'=>'required'          
        ]); 
        $exp = Expansion::findOrFail(1);

        $exp->total_cost = $request['total_cost'];
        $exp->current_donation = $request['current_donation'];
        $exp->update();
        return view('expansion.manage_donation', ['expansion'=>$exp]);
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Celebration;
use Illuminate\Http\Request;

class CelebrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCelebrations()

    {
        $celebs = Celebration::get();
        // $celebs = Celebration::where("publish_start","<=", date('Y-m-d'))
        // ->where("publish_end",">=", date('Y-m-d'))
        // ->get();


        return view("celebrations.manage_celebrations", ['celebrations'=>$celebs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSingleCelebration($id)
    {
        //
    }

    
    public function showAll()
    {


    }
    public function store(Request $request)
    {
        $request->validate([             
            'title' => 'required|min:10|max:190',//specify the table name in the database for unique validation
            'image_path'=>'required',
            'publish_start'=> 'required',
            'publish_end'=>'required'       
        ]); 

        $celeb = new Celebration;
        $celeb->title = $request['title'];
        $celeb->body = $request['body'];
        $celeb->image_path = $request['image_path'];
        $celeb->publish_start = $request['publish_start'];
        $celeb->publish_end = $request['publish_end'];
        $celeb->save();
        
        return redirect("manage_celebrations");       
    }
    

    
    public function edit($id)
    {
        $celebs = Celebration::get();
        $celeb = Celebration::findOrFail($id);
        return view('celebrations.edit_celebration', ['celebration'=>$celeb,
        'celebrations'=>$celebs]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([             
            'title' => 'required|min:10|max:190',//specify the table name in the database for unique validation
            'image_path'=>'required',
            'publish_start'=> 'required',
            'publish_end'=>'required'       
        ]); 

        $celeb = Celebration::findOrFail($id);
        $celeb->title = $request['title'];
        $celeb->body = $request['body'];
        $celeb->image_path = $request['image_path'];
        $celeb->publish_start = $request['publish_start'];
        $celeb->publish_end = $request['publish_end'];
        $celeb->update();
        
        return redirect("manage_celebrations");
    }

    
    public function destroy($id)
    {
        $celeb = Celebration::findOrFail($id);
        $celeb->delete();
        return redirect("manage_celebrations");

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Blog;
use App\Tag;
use App\Theme;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    // Manage events
    public function manage_events()
    {
        $evs = Event::get()->sortByDesc('updated_at');

        return view('events.manage_events',['events'=>$evs]);
    }



    public function create()
    {      
        return view('events.create_event');        
    }

    // Store event

    public function store(Request $request)
    {
        $request->validate([   
            //   'title', 'image_path','date','time','publish', 'body','location'
            'title' => 'required|unique:events|min:10|max:190',//specify the table name in the database for unique validation
            'image_path'=>'required',
            'date'=> 'required',
            'time'=>'required',
            'location'=>'required',
            'body' => 'required|min:50',
            'publish'=> 'required'            
        ]);        
        $event = new Event;
        $event->title = $request['title'];
        $event->location = $request['location'];
        $event->date = $request['date'];
        $event->time = $request['time'];           
        $event->image_path = $request['image_path'];
        $event->body = $request['body'];
        $event->publish = $request['publish'];        
        $event->save();

        return redirect('manage_events');
    }

    // Edit event
    public function edit($id)
    {        
        $ev = Event::findOrFail($id);
        return view('events.edit_event', ['event'=>$ev]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([   
            //   'title', 'image_path','date','time','publish', 'body','location'
            'title' => 'required|min:10|max:190',//specify the table name in the database for unique validation
            'image_path'=>'required',
            'date'=> 'required',
            'time'=>'required',
            'location'=>'required',
            'body' => 'required|min:50',
            'publish'=> 'required'            
        ]);
        $evt = Event::findOrFail($id);       
        $evt->title = $request['title'];
        $evt->location = $request['location'];
        $evt->date = $request['date'];
        $evt->time = $request['time'];           
        $evt->image_path = $request['image_path'];
        $evt->body = $request['body'];
        $evt->publish = $request['publish'];        
     
        $evt->update();
        return redirect('manage_events');
    }

    public function destroy($id)
    {
        $evt = Event::findOrFail($id);        
        #Delete the Blog
        $evt->delete();  
        return redirect('manage_events');
    }

    // Function to show or hide a blog (publish unpublish)
    public function showHide($id){
        $evt = Event::findOrFail($id);
        $evt->publish = !$evt->publish;
        $evt->update();
        return redirect('manage_events');
    }

    // Function to show or hide a blog (publish unpublish)
    public function showSingleEvent($id){

        $evt = Event::findOrFail($id);
        if($evt["publish"] == 1 || Auth::check()){
            $master_bls = Blog::where("publish", 1)->get()->sortBy('updated_at')->take(10);        
            // Get the other informations
            $tgs = Tag::get();          
            $thms = Theme::get();

            return view('events.show_event', ['event'=>$evt, "master_blogs"=>$master_bls, "themes"=>$thms, "tags"=>$tgs]);
        }else{
            return redirect('show_all_events');
        }
        
    }


    // Function to show all events
    public function showAllEvents(){
        $master_bls = Blog::where("publish", 1)->get()->sortByDesc('updated_at')->take(10);
        $evts = Event::where('publish', 1)->get()->sortByDesc('date');          
        
       // Get the other informations
       $tgs = Tag::get();          
       $thms = Theme::get();

        return view('events.show_all_events', ['events'=>$evts, "master_blogs"=>$master_bls, "themes"=>$thms, "tags"=>$tgs]);
    }

    
}

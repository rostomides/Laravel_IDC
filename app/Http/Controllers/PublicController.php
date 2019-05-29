<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Blog;
use App\Theme;
use App\Category;
use App\Tag;
use App\Event;
use App\Prayer;
use App\Biog;
use App\Iqamah;
use App\Celebration;

class PublicController extends Controller
{

    // Welcome page
    public function index(){
        // dd(Auth()->user()->cheikh);
        // Get the 10 first blogs
        $master_bls = Blog::where('publish',"=",'1')
        ->get(["id","title", "body", "updated_at", "biog_id", "image_path"])        
        ->sortByDesc('updated_at')
        ->take(10);

        // Send only the first 150 characters of every blog
        foreach($master_bls as $b){
            if(strlen($b['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $b['body']);
                $b['body'] = substr($b['body'] , 0, 150)."...";
            }
        }
       
        //Get the 10 last events
        $evts = Event::where('publish',"=",'1')
        ->get()        
        ->sortByDesc('date')
        ->take(10);

        // Send only the first 150 characters of every blog
        foreach($evts as $e){
            if(strlen($e['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $e['body']);
                $e['body'] = substr($e['body'] , 0, 200)."...";
            }
        }


        // Get celebration messages
        $celebs = Celebration::where("publish_start","<=", date('Y-m-d'))
        ->where("publish_end",">=", date('Y-m-d'))
        ->get();

        // Get themes
        $thms = Theme::get()->take(5);
        // Get tags
        $tgs = Tag::get(); 
        // get prayers
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

        return view('welcome', ['master_blogs'=>$master_bls, 'events'=>$evts, 'themes'=>$thms, 'tags'=>$tgs, 'current'=>$current, 'current_iqamah'=>$c_iqamah, 'celebrations'=>$celebs]);
    }


    // Function querying all needed informations for the search page
    private function SearchPageQueries(){
        $master_bls = Blog::where('publish',"=",'1')
        ->get(["id","title",  "updated_at", "biog_id", "image_path"])        
        ->sortByDesc('updated_at')
        ->take(10);
               
        $cats = Category::all();
        $tgs = Tag::get();
        $bios = Biog::get(["id", "name"]);
        // For the search bar
        $thms = Theme::get();
        return(['bios'=>$bios, 'themes'=>$thms, 'categories'=>$cats, 'tags'=>$tgs,'master_blogs'=>$master_bls]);
    }


    // Function showing all blogs in list   
    public function showAllBlogs(){
        $bls = Blog::where('publish',"=",'1')
        ->get()     
        ->sortByDesc('updated_at');
       
        // Send only the first 150 characters of every blog
        foreach($bls as $b){
            if(strlen($b['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $b['body']);
                $b['body'] = substr($b['body'] , 0, 150)."...";
            }
        }
        // Query needed informations
        $query = $this->SearchPageQueries();
        $query = array_merge($query, ['blogs' => $bls, 'type'=>"List of all posts" ,'by'=>'']);

        return view('blogs.show_blogs_by', $query);
    }

    public function showBlogByTheme($id){
        // For the search bar            
        $bls = Blog::where(["theme_id"=> $id, "publish"=> 1])
        ->get()     
        ->sortByDesc('updated_at');       
        // Send only the first 150 characters of every blog
        foreach($bls as $b){
            if(strlen($b['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $b['body']);
                $b['body'] = substr($b['body'] , 0, 150)."...";
            }
        }       
        
        $thm = Theme::find($id)['theme'];
        // Query needed informations
        $query = $this->SearchPageQueries();
        $query = array_merge($query, ['blogs' => $bls, 'type'=>"Results for Theme" ,'by'=>$thm ]);

        return view('blogs.show_blogs_by', $query);
    }

    public function showBlogByTag($id){        
        $bls = Blog::whereHas('tags', function ($query) use ($id) {
            return $query->where(['tag_id'=> $id,
                                    "publish"=>1]);
        })->get()
        ->sortByDesc('updated_at');

        foreach($bls as $b){
            if(strlen($b['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $b['body']);
                $b['body'] = substr($b['body'] , 0, 150)."...";
            }
        }
         
               
        $tg = Tag::find($id)['tag']; //searched the tag       
        // Query needed informations
        $query = $this->SearchPageQueries();
        $query = array_merge($query, ['blogs' => $bls, 'type'=>"Results for Tag" ,'by'=>$tg ]);

        return view('blogs.show_blogs_by', $query);
    }


    public function showBlogByCategory($id){
        // For the search bar            
        $bls = Blog::where(["category_id"=> $id, "publish"=> 1])->get()
        ->sortByDesc('updated_at');

        foreach($bls as $b){
            if(strlen($b['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $b['body']);
                $b['body'] = substr($b['body'] , 0, 150)."...";
            }
        }

        $cat = Category::find($id)['category'];   

        // Query needed informations
        $query = $this->SearchPageQueries();
        $query = array_merge($query, ['blogs' => $bls, 'type'=>"Results for category" ,'by'=>$cat ]);

        return view('blogs.show_blogs_by', $query);
    }

    public function showBlogByAuthor($id){
        // For the search bar            
        $bls = Blog::where(["biog_id"=> $id, "publish"=> 1])->get();        
        $bio = Biog::find($id)['name'];
        

        foreach($bls as $b){
            if(strlen($b['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $b['body']);
                $b['body'] = substr($b['body'] , 0, 150)."...";
            }
        }


        // Query needed informations
        $query = $this->SearchPageQueries();
        $query = array_merge($query, ['blogs' => $bls, 'type'=>"Results for author" ,'by'=>$bio ]);

        return view('blogs.show_blogs_by', $query);
    }

   

    public function returnSearch(Request $request){  
                
        $where = ['publish'=>1];
        // check if theme is not empty
        if($request['theme'] != "Select a theme"){
            $theme_id = Theme::findOrFail($request['theme'])->id; 
            $where['theme_id'] =  $theme_id;       
        }

        // check if author is not empty
        if($request['author'] != "Select an author"){
            $biog_id = Biog::findOrFail($request['author'])->id; 
            $where['biog_id'] =  $biog_id;       
        }

        // check if category is not empty
        if($request['category'] != "Select a category"){
            $category_id = Category::findOrFail($request['category'])->id; 
            $where['category_id'] =  $category_id;       
        }

        // Format the dates for comparison
        $start = \Carbon\Carbon::parse($request['from_date'])->startOfDay();  
        $end = \Carbon\Carbon::parse($request['to_date'])->endOfDay();       
                       
        // Check tags
        $bls = [];
        if(count($where)>0){            
            $bls1 = Blog::where($where)
            ->where('updated_at', ">=", $start)
            ->where('updated_at', "<=", $end)
            ->get()->sortByDesc('updated_at');
            
            if(!is_null($request['tags'])){                                
                // Look at the tags in the previous query
                foreach($bls1 as $bl){
                    $ids = [];
                    foreach($bl->tags as $tg){
                        array_push($ids, $tg->id);
                    }
                    if(!array_diff($request['tags'], $ids)){
                        array_push($bls, $bl->id);
                    }                    
                }
                // Query the ids
                if(count($bls)>0){
                    $bls = Blog::find($bls)->sortByDesc('updated_at');
                }
            }else{                
                $bls = $bls1;
            }            
        }
        else{
            $bls1 = Blog::where("publish", 1)->get()
            ->where('updated_at', ">=", $start)
            ->where('updated_at', "<=", $end);
            
            if($request['tags']!=""){                                
                // Look at the tags in the previous query
                foreach($bls1 as $bl){
                    $ids = [];
                    foreach($bl->tags as $tg){
                        array_push($ids, $tg->id);
                    }
                    if(!array_diff($request['tags'], $ids)){
                        array_push($bls, $bl->id);
                    }                    
                }
                // Query the ids
                if(count($bls)>0){
                    $bls = Blog::find($bls)->sortByDesc('updated_at');
                }
            } else{
                $bls = $bls1;
            }           
        }    

        foreach($bls as $b){
            if(strlen($b['body'])>140){
                $xx = preg_replace('~\<.+\>|\<.+/\>~', ' ', $b['body']);
                $b['body'] = substr($b['body'] , 0, 150)."...";
            }
        }

        // Query needed informations
        $query = $this->SearchPageQueries();
        $query = array_merge($query, ['blogs' => $bls, 'type'=>"Advanced research" ,'by'=>"Results"]);

        return view('blogs.show_blogs_by', $query);
    }
}

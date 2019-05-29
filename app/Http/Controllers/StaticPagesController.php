<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Theme;
use App\Category;
use App\Tag;
use App\Event;
use App\Prayer;
use App\Biog;
use App\Expansion;

class StaticPagesController extends Controller
{

    private function SearchPageQueries(){
        $master_bls = Blog::where("publish",1)->get()->sortByDesc('updated_at')->take(10);
        $cats = Category::all();
        $tgs = Tag::get();
        $bios = Biog::get(["id", "name"]);
        // For the search bar
        $thms = Theme::get();
        return(['bios'=>$bios, 'themes'=>$thms, 'categories'=>$cats, 'tags'=>$tgs,'master_blogs'=>$master_bls]);
    }

    
    public function donation(){
        $exp = Expansion::findOrFail(1);
        // $query = $this->SearchPageQueries();
        return view('static.donation', ['expansion'=>$exp]);
    }


    public function courses(){
        $query = $this->SearchPageQueries();
        return view('static.courses_details', $query);
    }

    public function DailyPrayers(){
        $query = $this->SearchPageQueries();
        return view('static.daily_prayers', $query);
    }

    public function jumuaaPrayer(){
        $query = $this->SearchPageQueries();
        return view('static.jumuaa_prayers', $query);
    }

    public function letQuranSpeak(){
        $query = $this->SearchPageQueries();
        return view('static.let_quran_speak', $query);
    }

}



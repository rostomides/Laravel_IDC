<?php

namespace App\Http\Controllers;

use App\Biog;
use App\Blog;
use App\Theme;
use App\Category;
use App\Tag;

use Illuminate\Http\Request;

class BiogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_authors()
    {
        $bios = Biog::get(["id","name", "email", "updated_at"]);
        return view("authors.manage_authors", ["bios"=>$bios]);
    }

    
    public function store(Request $request)
    {
        
        $request->validate([            
            'name' => 'required|unique:biogs|min:10|max:190',//specify the table name in the database for unique validation       
            'body' => 'required|min:50'                       
        ]);
        //Store the blog

        $bio = new Biog;
        $bio->image_path = $request['image_path'];
        $bio->name = $request['name'];
        $bio->email = $request['email'];
        $bio->body = $request['body'];
        $bio->save();
        return redirect("manage_authors");  
    }

    
    public function showSingleAuthor($id)
    {
        $bio = Biog::findOrFail($id);
        $master_bls = Blog::where("publish",1)->get()->sortByDesc('updated_at')->take(10);
        $tgs = Tag::get();          
        $thms = Theme::get();            
        return view('authors.show_author', ['bio'=>$bio, "master_blogs"=>$master_bls, "themes"=>$thms, "tags"=>$tgs]);
    }

    
    public function edit(Biog $biog, $id)
    {
        $bio = Biog::findOrFail($id);        
        $bios = Biog::get(["id","name", "email", "updated_at"]);
        return view("authors.edit_author", ["bio"=>$bio, "bios"=>$bios]); 

    }

    
    public function update(Request $request, Biog $biog, $id)
    {
        $request->validate([            
            'name' => 'required|min:10|max:190',//specify the table name in the database for unique validation       
            'body' => 'required|min:50'                       
        ]);
        // Update the author
        $bio = Biog::findOrFail($id); 
        $bio->image_path = $request['image_path'];
        $bio->name = $request['name'];
        $bio->email = $request['email'];
        $bio->body = $request['body'];
        $bio->update();
        return redirect("manage_authors");
    }

    
    public function destroy($id)
    {
        $bio = Biog::findOrFail($id);
        $bio->delete();
        return redirect("manage_authors");
    }
}

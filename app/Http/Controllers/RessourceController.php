<?php

namespace App\Http\Controllers;

use App\Ressource;
use App\Blog;
use App\Theme;
use App\Category;
use App\Tag;

use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_ressources()
    {
        $res = Ressource::get();
        return view("ressources.manage_ressources", ['ressources'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([            
            'title' => 'required|min:10|max:190',//specify the table name in the database for unique validation            
            'file_path'=>'required', 
            'body' => 'required|min:50'                       
        ]);
        $res = new Ressource;
        $res->title = $request['title'];
        $res->image_path = $request['image_path'];
        $res->file_path = $request['file_path'];
        $res->body = $request['body'];
        $res->save();

        return redirect('manage_ressources');
    }

    public function showAll()
    {
        $res = Ressource::get();
        $master_bls = Blog::where("publish",1)->get()->sortByDesc('updated_at')->take(10);
        $tgs = Tag::get();          
        $thms = Theme::get();            
        return view('ressources.show_all_ressources', ['ressources'=>$res, "master_blogs"=>$master_bls, "themes"=>$thms, "tags"=>$tgs]);
    }



    public function showSingleRessource($id)
    {
        $res = Ressource::findOrFail($id);
        $master_bls = Blog::where("publish",1)->get()->sortByDesc('updated_at')->take(10);
        $tgs = Tag::get();          
        $thms = Theme::get();            
        return view('ressources.show_ressource', ['ressource'=>$res, "master_blogs"=>$master_bls, "themes"=>$thms, "tags"=>$tgs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ressource  $ressource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Ressource::findOrFail($id);
        $ress = Ressource::get();
        return view("ressources.edit_ressource", ['ressources'=>$ress, 
        'ressource'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ressource  $ressource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([            
            'title' => 'required|min:10|max:190',//specify the table name in the database for unique validation            
            'file_path'=>'required', 
            'body' => 'required|min:50'                       
        ]);
        $res = Ressource::findOrFail($id);
        $res->title = $request['title'];
        $res->image_path = $request['image_path'];
        $res->file_path = $request['file_path'];
        $res->body = $request['body'];
        $res->update();

        return redirect('manage_ressources');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ressource  $ressource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Ressource::findOrFail($id);        
        $res->delete();
        return redirect('manage_ressources');
    }
}

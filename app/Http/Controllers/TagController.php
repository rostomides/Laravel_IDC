<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $t = Tag::get();
        return view('tags.manage_tags', ['tags'=>$t]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        // dd($request)  ;
        $request->validate([
            'tag'=> 'required|min:2|unique:tags',
        ]);        
        $t = new Tag;
        $t->tag = $request['tag'];
        $t->save();
        $message = "Tag: ". $request['tag']." succefully created";
        return redirect('manage_tags')->with(['success'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $t = Tag::findOrFail($id);
        $t_all = Tag::get();
        return view('tags.edit_tag', ['tags'=>$t_all, 'single_tag'=>$t]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $request->validate([
            'tag'=> 'required|min:2|',
        ]);
        $t = Tag::findOrFail($id);       
        $t->tag = $request['tag'];
        $t->update();
        $message = "Tag: ". $request['tag']." succefully updated";
        return redirect('manage_tags')->with(['success'=>$message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Tag::findOrFail($id);
        $t->blogs()->detach();
        $t->delete();
        $message = "Tag: ". $t->tag." succefully deleted";
        return redirect('manage_tags')->with(['success'=>$message]);
    }
}

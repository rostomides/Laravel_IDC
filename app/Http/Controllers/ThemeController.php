<?php

namespace App\Http\Controllers;

use App\theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
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
        $t = Theme::get();
        return view('themes.manage_themes', ['themes'=>$t]);
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
            'theme'=> 'required|min:2|unique:themes',
        ]);        
        $t = new Theme;
        $t->theme = $request['theme'];
        $t->save();
        $message = "Theme: ". $request['theme']." succefully created";
        return redirect('manage_themes')->with(['success'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $t = Theme::findOrFail($id);
        $t_all = Theme::get();
        return view('Themes.edit_Theme', ['themes'=>$t_all, 'single_theme'=>$t]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'theme'=> 'required|min:2|',
        ]);
        $t = Theme::findOrFail($id);       
        $t->theme = $request['theme'];
        $t->update();
        $message = "Theme: ". $request['theme']." succefully updated";
        return redirect('manage_themes')->with(['success'=>$message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Theme::findOrFail($id);
        $t->blogs()->detach();
        $t->delete();
        $message = "Theme: ". $t->theme." succefully deleted";
        return redirect('manage_themes')->with(['success'=>$message]);
    }
}

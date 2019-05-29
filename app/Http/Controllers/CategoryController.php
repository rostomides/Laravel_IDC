<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $cats = Category::get();
        return view('categories.manage_categories', ['categories'=>$cats]);
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
            'category'=> 'required|min:2|unique:categories',
        ]);        
        $cat = new Category;
        $cat->category = $request['category'];
        $cat->save();
        $message = "Category: ". $request['category']." succefully created";
        return redirect('manage_categories')->with(['success'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        $cat_all = Category::get();
        return view('categories.edit_category', ['categories'=>$cat_all, 'single_category'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category'=> 'required|min:2|',
        ]);
        $cat = Category::findOrFail($id);       
        $cat->category = $request['category'];
        $cat->update();
        $message = "Category: ". $request['category']." succefully updated";
        return redirect('manage_categories')->with(['success'=>$message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        //$cat->blogs()->detach;
        $cat->delete();
        $message = "Category: ". $cat->category." succefully deleted";
        return redirect('manage_categories')->with(['success'=>$message]);
    }
}

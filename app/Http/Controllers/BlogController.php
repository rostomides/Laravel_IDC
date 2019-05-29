<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use App\Theme;
use App\Category;
use App\Biog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_blogs()
    {
        $bls = Blog::get()->sortByDesc('updated_at');

        return view('blogs.manage_blogs',['blogs'=>$bls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thms = Theme::get(); //fetch theme table
        $cats = Category::get(); //fetch categories table
        $tgs = Tag::get();
        $bios = Biog::get(["id", "name"]);   

        return view('blogs.create_blog', ['tags'=>$tgs, 'categories'=>$cats, 'themes'=>$thms, "bios"=>$bios]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([           
            'title' => 'required|unique:blogs|min:10|max:190',//specify the table name in the database for unique validation
            'author'=>'required',
            'theme'=>'required',
            'tags'=> 'required',
            'category'=>'required',
            'body' => 'required|min:50',
            'publish'=> 'required',
            'image_path'=> 'required'           
        ]);
        //Store the blog
        $category = Category::where('category', $request['category'])->first();
        $theme = Theme::where('theme', $request['theme'])->first();
        $author = Biog::where('id', $request['author'])->first();
        $blog = new Blog;
        $blog->title = $request['title'];
        $blog->category()->associate($category);
        $blog->theme()->associate($theme);
        $blog->biog()->associate($author);
        $blog->image_path = $request['image_path'];
        $blog->body = $request['body'];
        $blog->publish = $request['publish'];        
        $blog->save();     
        
        $blog->tags()->sync($request['tags'], true);

        return redirect('manage_blogs');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $bios = Biog::get(["id", "name"]); 
        $thms = Theme::get(); //fetch theme table
        $cats = Category::get(); //fetch categories table               
        $tgs = Tag::get();
        $bl = Blog::findOrFail($id);
        return view('blogs.edit_blog', ['blog'=>$bl, 'tags'=>$tgs, 'categories'=>$cats, 'themes'=>$thms, "bios"=>$bios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([            
            'title' => 'required|min:10|max:190',//specify the table name in the database for unique validation
            'author'=>'required',
            'theme'=>'required',
            'tags'=> 'required',
            'category'=>'required',
            'body' => 'required|min:50',
            'publish'=> 'required'            
        ]);
        $category = Category::where('category', $request['category'])->first();
        $theme = Theme::where('theme', $request['theme'])->first();
        $author = Biog::where('id', $request['author'])->first();
        //Store the blog
        $blog = Blog::findOrFail($id);
        $blog->title = $request['title'];
        $blog->category()->associate($category);
        $blog->theme()->associate($theme);
        $blog->biog()->associate($author);
        $blog->image_path = $request['image_path'];
        $blog->body = $request['body'];
        $blog->publish = $request['publish'];
        $blog->update();           

        $blog->tags()->sync($request['tags'], true);

        return redirect('manage_blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bl = Blog::findOrFail($id);
        #Remove the relationship in tags
        $bl->tags()->detach();
        #Delete the Blog
        $bl->delete();        

        return redirect('manage_blogs');
    }

    // Function to show or hide a blog (publish unpublish)
    public function showHide($id){
        $bl = Blog::findOrFail($id);
        $bl->publish = !$bl->publish;
        $bl->update();
        return redirect('manage_blogs');

    }

    // Show a single blog
    public function showSingleBlog($id){

        $bl = Blog::findOrFail($id); 
        if($bl['publish'] == 1){
            $master_bls = Blog::where("publish", 1)->get()->sortByDesc('updated_at')->take(10);
               
            //get the ids of the following and previous non hided posts
            $bls_all = Blog::where("publish", 1)->get()->sortBy('updated_at');
            $previous = "None";
            $following = "None";

            foreach($bls_all as $blog)
            {
                if(strtotime($blog['updated_at']) < strtotime($bl['updated_at'])){
                    // Constantly update $previous as long as it is < blog update_at     
                    $previous = $blog['id'];                                 
                }else if(strtotime($blog['updated_at']) > strtotime($bl['updated_at'])){    
                    // Get the first record for which update_at> to blog updated_at
                    $following = $blog['id'];                    
                    break;                                    
                }
            }
            //Other needed informations      
            $tgs = Tag::get();          
            $thms = Theme::get();            
            return view('blogs.show_blog', ['blog'=>$bl, "master_blogs"=>$master_bls, "previous"=> $previous, "following"=>$following, "themes"=>$thms, "tags"=>$tgs]);
        }else{
            return redirect("/all_blogs");            
        }       
    }
}

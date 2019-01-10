<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $data['posts'] = cache('posts',function(){
            return Post::orderBy('created_at','desc')->paginate(10);
        });
        return view('backend/posts/index',$data);
    }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["categories"] = Category::all();
        $data["tags"] = Tag::all();

        return view('backend/posts/create',$data);    
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'content' => 'string',
            'thumbnail' => 'image',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }

        $imgName = cms_image_process($request,"thumbnail");



        $post = Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'short_content' => $request->short_content,
            'thumbnail' => $imgName,
            'user_id' => auth()->user()->id,
            'status' => $request->status,
            'type' => $request->type,
            
        ]);

        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);
        
        Session::flash('type','success');
        Session::flash('message','Post Successfully Created');

        return redirect()->route('posts.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data["post"] = $post;
        return view('backend/posts/show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data["post"] = $post;
        $data["categories"] = Category::all();
        $data["tags"] = Tag::all();
       
        return view('backend.posts.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'content' => 'string',
            'thumbnail' => 'image',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }

        if($request->hasFile('thumbnail')){

            $imgValidator = Validator::make($request->all(),[
                'thumbnail' => 'image',
            ]);

            if($imgValidator->fails()){

                return redirect()->back()->withErrors($imgValidator);
            }

            
            $imgName = sprintf('%s.%s',str_random(10),$request->thumbnail->extension());
            
            $request->thumbnail->storeAs('images',$imgName);
        }


        if($request->hasFile('thumbnail')){

            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'short_content' => $request->short_content,
                'status' => $request->status,
                'type' => $request->type,
                'thumbnail' => $imgName
            ]);

        }else{
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'short_content' => $request->short_content,
                'status' => $request->status,
                'type' => $request->type
            ]);
    
        }

        if($request->categories){
            $post->categories()->sync($request->categories);    
        }

        if($request->tags){
            $post->tags()->sync($request->tags);    
        }

        
        Session::flash('type','success');
        Session::flash('message','Post Successfully Updated');

        return redirect()->route('posts.show',$post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        session()->flash('type','success');
        session()->flash('message','Post Successfully Deleted');

        return redirect()->route('posts.index');
    }
}

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
        return view('backend/posts',$data);
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

        return view('backend/create-post',$data);    
    }


        // Category live search 

        public function postSearch(Request $request){
        
            $output = "";
    
            if($request->ajax()){
                $posts = Post::where('title','LIKE','%'.$request->search.'%')->get();
                
                if($posts->count() > 0){
                    foreach($posts as $post){
                        $output .='<tr class="gradeA odd" role="row">';
                        
                        $output .= sprintf('<td class="sorting_1">%s</td>',$post->id);
                        $output .= sprintf('<td class="sorting_1">%s</td>',$post->title);
                        $output .= sprintf('<td class="sorting_1">%s</td>',$post->content);
                        $output .= sprintf('<td class="sorting_1"><img src="%s" width="100" height="100"></td>', asset("storage/images/".$post->thumbnail));
                        $output .= sprintf('<td class="sorting_1"><a href="%s" class="btn btn-primary">Details</a></td>', route('posts.show',$post->slug));
                        $output .='</tr>';
                    }
    
               
                }
    
            }
    
            return \response($output);
             
        }
    
    
        // Category Limit 
    
            // Category live search 
    
            public function postLimit(Request $request){
            
                $output = "";
        
                if($request->ajax()){
                    $posts = Post::take($request->limit)->get();
                    
                    if($posts->count() > 0){
                        foreach($posts as $post){
                            $output .='<tr class="gradeA odd" role="row">';
                            
                            $output .= sprintf('<td class="sorting_1">%s</td>',$post->id);
                            $output .= sprintf('<td class="sorting_1">%s</td>',$post->title);
                            $output .= sprintf('<td class="sorting_1">%s</td>',$post->content);
                            $output .= sprintf('<td class="sorting_1"><img src="%s" width="100" height="100"></td>', asset("storage/images/".$post->thumbnail));
                            $output .= sprintf('<td class="sorting_1"><a href="%s" class="btn btn-primary">Details</a></td>', route('categories.show',$post->slug));
                            $output .='</tr>';
                        }
        
                   
                    }
        
                }
        
                return \response($output);
                 
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

        if($request->hasFile('thumbnail')){

            $imgName = sprintf('%s.%s',str_random(10),$request->thumbnail->extension());
            
            $request->thumbnail->storeAs('images',$imgName);
        }else{

            $imgName = 'default.jpg';

        }


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
        return view('backend/post',$data);

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
        return view('backend/edit-post',$data);

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

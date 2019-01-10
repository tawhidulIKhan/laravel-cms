<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $data['tags'] = Cache::get('tags',function(){
            return Tag::orderBy('created_at','desc')->paginate(10);
        });

        return view('backend.tags.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tags.create');    

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
            'name' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }

     
        $slug = str_slug($request->name);

        $tagExists = Tag::where('slug',$slug)->first();

        if($tagExists){
            Session::flash('type','danger');
            Session::flash('message','Tag Already exists');
    
            return redirect()->route('tags.create');
        }

        $tag = Tag::create([
            'name' => $request->name,
            'slug' => $slug,
            ]);

        
        Session::flash('type','success');
        Session::flash('message','Tag Successfully Added');

        return redirect()->route('tags.create');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {   
        $data['tag'] = $tag;

        return view('backend.tags.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $data["tag"] = $tag;

        return view('backend.tags.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }

     
        $slug = str_slug($request->name);

   

        $tag->create([
            'name' => $request->name,
            'slug' => $slug,
            ]);

        
        Session::flash('type','success');
        Session::flash('message','Tag Successfully Updated');

        return redirect()->route('tags.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        Session::flash('type','success');
        Session::flash('message','Tag Deleted Successfully');

        return redirect()->route('tags.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $data['categories'] = Cache::get('categories', function(){
            return Category::orderBy('created_at','desc')->paginate(10);
        });

        return view('backend.categories.index',$data);
    }
    

        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');    
    
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
            'thumbnail' => 'image'
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

        $slug = str_slug($request->name);

        $categoryExists = Category::where('slug',$slug)->first();

        if($categoryExists){
            Session::flash('type','danger');
            Session::flash('message','Category Already exists');
    
            return redirect()->route('categories.create');
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'thumbnail' => $imgName,
        ]);

        
        Session::flash('type','success');
        Session::flash('message','Category Successfully Added');

        return redirect()->route('categories.create');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
        $data['category'] = $category;

        return view('backend.categories.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   
        $data['category'] = $category;

        return view('backend.categories.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'string',
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

        $slug = str_slug($request->name);

        if($request->hasFile('thumbnail')){

            $category->update([
                'name' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
                'thumbnail' => $imgName,
            ]);

        }else{
            $category->update([
                'name' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
            ]);
    
        }

        
        Session::flash('type','success');
        Session::flash('message','Category Successfully Updated');

        return redirect()->route('categories.show',$category);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash('type','success');
        Session::flash('message','Category Deleted Successfully');

        return redirect()->route('categories.index');
    }
}

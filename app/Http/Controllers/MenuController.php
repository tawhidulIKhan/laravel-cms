<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $data['menus'] = cache('menus',function(){
            return Menu::orderBy('created_at','desc')->paginate(10);
        });
        return view('backend/menus/index',$data);
    }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend/menus/create');    
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
            'name' => 'required|string|unique:menus',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }




        $post = Menu::create([
            'name' => $request->name,
        ]);

        
        Session::flash('type','success');
        Session::flash('message','Menu Successfully Created');

        return redirect()->route('menus.create');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $data["menu"] = $menu;
        return view('backend.menus.edit',$data);

    }

    /**
     * Update the specified resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }



            $menu->update([
                'name' => $request->name,
            ]);
    


        
        Session::flash('type','success');
        Session::flash('message','Menu Successfully Updated');

        return redirect()->route('menus.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        
        session()->flash('type','success');
        session()->flash('message','Menu Successfully Deleted');

        return redirect()->route('menu.index');
    }
}

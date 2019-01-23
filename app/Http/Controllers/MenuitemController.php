<?php

namespace App\Http\Controllers;

use App\Menuitem;
use Illuminate\Http\Request;

class MenuitemController extends Controller
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
        return view('backend/menuitems/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menuitem  $menuitem
     * @return \Illuminate\Http\Response
     */
    public function show(Menuitem $menuitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menuitem  $menuitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Menuitem $menuitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menuitem  $menuitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menuitem $menuitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menuitem  $menuitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menuitem $menuitem)
    {
        //
    }
}

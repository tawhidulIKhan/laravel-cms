<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('permission:create_roles');
    }   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = cache('roles',function(){
            return Role::latest()->paginate(10);
        });

        return view('backend/roles/index',$data);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["permissions"] = Permission::all();

        return view('backend/roles/create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|unique:roles',
            'display_name' => 'required',
        ]);

        if($validation->fails()){
            return redirect()->route('roles.create')->withErrors($validation);
        }


        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role->permissions()->attach($request->permissions);


        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data['role'] = $role;
        $data['permissions'] = Permission::all();
        return view('backend.roles.edit',$data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'display_name' => 'required|string',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }



            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);


        if($request->permissions){
            $role->permissions()->sync($request->permissions);    
        }

        
        Session::flash('type','success');
        Session::flash('message','Role Successfully Updated');

        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        
        session()->flash('type','success');
        session()->flash('message','Role Successfully Deleted');

        return redirect()->route('roles.index');
        
    }
}

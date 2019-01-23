<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permissions'] = cache('permissions',function(){
            return Permission::latest()->paginate(10);
        });
        return view('backend/permissions/index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["tables"] = DB::select('SHOW TABLES');
     
//        dd($data['tables'][0]);
  
return view('backend/permissions/create',$data);    
 
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
            'table' => 'required',
        ]);

        if($validation->fails()){
            return redirect()->route('permissions.create')->withErrors($validation);
        }


        foreach($request->action as $item){

            $key = $item . '_' .$request->table;
            $permissionExist = Permission::where('key',$key)->first();
           
            if($permissionExist){
                session()->flash('type','danger');
                session()->flash('message','Item Already exists');
                return redirect()->route('permissions.create');
            }

            Permission::create([
                'key' => $key,
                'table_name' => $request->table
            ]);
        }

        return redirect()->route('permissions.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        
        session()->flash('type','success');
        session()->flash('message','Permission Successfully Deleted');

        return redirect()->route('permissions.index');
        }
}

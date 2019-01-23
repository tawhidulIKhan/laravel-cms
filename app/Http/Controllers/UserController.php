<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('permission:create_users');
    }   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::latest()->paginate(10);
        $data['tusers'] = User::onlyTrashed()->paginate(10);
       
        return view('backend.users.index',$data);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $data['roles'] = Role::all();
       return view('backend.users.create',$data);    
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
            'username' => 'required|string',
            'email' => 'string|email|unique:users'
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }


        $password = str_random(10);
        $token = str_random(20);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'email_verification_token' => $token,
            'password' => \bcrypt($password)
        ]);


        $user->roles()->attach($request->roles);

        $user->notify(new \App\Notifications\UserCreatedMail($user,$password));
        
        Session::flash('type','success');
        Session::flash('message','User Successfully Created');

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data['user'] = $user;

        return view('backend.users.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['user'] = $user;
        $data['roles'] = Role::all();

        return view('backend.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|string',
            'email' => 'required|string',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }

     

   

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            ]);

         $user->roles()->sync($request->roles);

        
        Session::flash('type','success');
        Session::flash('message','User Successfully Updated');

        return redirect()->route('users.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('type','success');
        Session::flash('message','User Deleted Successfully');

        return redirect()->route('users.index');
    }

    public function restore($id)
    {

        User::withTrashed()
        ->where('id', $id)
        ->restore();

        Session::flash('type','success');
        Session::flash('message',' User Restored Successfully');

        return redirect()->route('users.index');
    }

    public function force_delete($id)
    {

        User::withTrashed()
        ->where('id', $id)
        ->forceDelete();

        Session::flash('type','success');
        Session::flash('message','User Permanently deleted');

        return redirect()->route('users.index');
    }


}

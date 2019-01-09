<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    // Show Dashboard

    public function dashboardShow(){
        return view('/backend/index');
    }


    public function user_profile(){
        
        $data["user"] = auth()->user();

        return view('backend/user-details',$data);
    }

    public function user_edit(){
        
        $data["user"] = auth()->user();

        return view('backend/user-edit',$data);
    }

    public function user_update(Request $request,$id){
        
        $validator = Validator::make($request->all(),[
            'username' => 'required|min:4',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
       ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }


        $thumbImgName = cms_image_process($request,'thumbnail');

        $coverImgName = cms_image_process($request,'cover_photo');


        $user = User::find($id);

        if($request->hasFile('cover_photo') && $request->hasFile('thumbnail')){
            $user->update([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'thumbnail' => $thumbImgName,
                'cover_photo' => $coverImgName,
          ]);
                  
        Session::flash('type','success');
        Session::flash('message','Your Profile Successfully Updated');

        return redirect()->route('user.profile');

        }elseif($request->hasFile('thumbnail')){

            $user->update([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'thumbnail' => $thumbImgName,
          ]);

                  
        Session::flash('type','success');
        Session::flash('message','Your Profile Successfully Updated');

        return redirect()->route('user.profile');
    

        }elseif($request->hasFile('cover_photo')){
            $user->update([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'cover_photo' => $coverImgName,
          ]);
                  
        Session::flash('type','success');
        Session::flash('message','Your Profile Successfully Updated');

        return redirect()->route('user.profile');

        }else{
            $user->update([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
          ]);

                  
        Session::flash('type','success');
        Session::flash('message','Your Profile Successfully Updated');

        return redirect()->route('user.profile');

        }




    }

    public function user_destroy($id)
    {
        $user = User::where('id',$id)->first();
        auth()->logout();
        $user->delete();
        return redirect()->route('home');

    }

}

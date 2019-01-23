<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    // Show Dashboard

    public function dashboardShow(){
        $data["total_post"] = count(Post::all()); 
        $data["total_category"] = count(Category::all()); 
        $data["total_user"] = count(User::all()); 
        return view('/backend/index',$data);
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
            'email' => 'required|email',
       ]);


        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }


        if($request->password){
            $validator = Validator::make($request->all(),[
                'password' => 'confirm',
           ]);
    
    
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
    
        }




        $thumbImgName = cms_image_process($request,'thumbnail');



        $user = User::find($id);

        if($request->hasFile('thumbnail')){

            if($request->password){
                $user->update([
                    'username' => $request->username,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'password' => \bcrypt($request->password),
                    'email' => $request->email,
                    'thumbnail' => $thumbImgName,
              ]);

            }else{
                $user->update([
                    'username' => $request->username,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'thumbnail' => $thumbImgName,
              ]);
    
            }

                  
        Session::flash('type','success');
        Session::flash('message','Your Profile Successfully Updated');

        return redirect()->route('user.profile');
    

        }else{
            if($request->password){
                $user->update([
                    'username' => $request->username,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'password' => \bcrypt($request->password),
                    'email' => $request->email,
              ]);

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
}

    public function user_destroy($id)
    {
        $user = User::where('id',$id)->first();
        auth()->logout();
        $user->delete();
        return redirect()->route('home');

    }

}

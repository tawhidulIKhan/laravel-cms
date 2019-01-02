<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\VerifyMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Show register page

    public function resgisterShow(){
        return view('frontend/register');
    }

    // Register Store

    public function resgisterStore(Request $request){
        
        $validator = Validator::make($request->all(),[
            'username' => 'required|min:4',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
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

        $token = str_random(10);

        $user = User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_varification_token' => $token,
            'thumbnail' => $imgName,
            'role' => 'subscriber'
        ]);

        $user->notify(new VerifyMail($user));
        
        Session::flash('type','success');
        Session::flash('message','Your Registration successfull,Activation link have been sent');

        return redirect()->route('login');

        


    }

    // Show login page
    
    public function loginShow(){
        return view('frontend/login');
    }

    // Show login page
    
    public function loginStore(){
    }

    // Email Verification

    public function verify($token){
        dd($token);
    }


}

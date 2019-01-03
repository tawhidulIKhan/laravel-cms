<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
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
            'email_verification_token' => $token,
            'thumbnail' => $imgName,
            'role' => 'subscriber'
        ]);

        $user->notify(new VerifyMail($user));
        
        Session::flash('type','success');
        Session::flash('message','Your Registration successfull,Activation link have been sent');

        return redirect()->route('login');

        


    }

    // Email Verification

    public function verify($token){
        
        if($token == null){ // Token Empty
            session()->flash('type','danger');
            session()->flash('message','Token is empty');
            return redirect()->route('login');
        }

        $user = User::where('email_verification_token',$token)->first();

        if(!$user){
            session()->flash('type','danger');
            session()->flash('message','Invalid Token');
            return redirect()->route('login');
        }

        if($user){
            $user->update([
                'email_verification_token' => '',
                'email_verified_at' => Carbon::now()
            ]);
            
            session()->flash('type','success');
            session()->flash('message','You are activated now');
            return redirect()->route('login');
        }



    }


        // Email Verification Again

        public function verifyAgain(){
        
            return view('frontend/mail-verify-again');
            
        }
    
        // Resend Verification

        public function resendVerification(Request $request){

            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
            ]);

            if($validator->fails()){
               return redirect()->back()->withErrors($validator);
            }

            $user = User::where('email',$request->email)->first();
            
            $token = str_random(20);

            if(!$user){

                session()->flash('type','danger');
                session()->flash('message','You entered wrong credential.');
                return redirect()->route('verifyAgain');
            }
            $user->update([
                'email_verification_token' => $token
            ]);
            
            $user->notify(new VerifyMail($user));
            
            session()->flash('type','success');
            session()->flash('message','Email Verification Token Send Again to Your Mail. Check your mail.');
            
            return redirect()->route('verifyAgain');
        }

        // Show login page
    
        public function loginShow(){
            return view('frontend/login');
        }
    
        // Show login page
        
        public function loginStore(Request $request){

            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ]);
    
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            $user = User::where($credentials)->get();


            if(!$user){
                session()->flash('type','danger');
                session()->flash('message','User not found');
                return redirect()->back();
            }


            if(auth()->attempt($credentials)){

                $verified = auth()->user()->email_verified_at;

                if($verified == null){
                    session()->flash('type','warning');
                    session()->flash('message','Your account is not verified');
                    auth()->logout();
                    return redirect()->route('verifyAgain');
                
                }

                return redirect()->route('dashboard');


            }
    
        }
    
    

}

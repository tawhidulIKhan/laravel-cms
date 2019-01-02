<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show register page

    public function showRegister(){
        return view('frontend/register');
    }


    // Show login page
    
    public function showLogin(){
        return view('frontend/login');
    }


}

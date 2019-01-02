<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // homepage

    public function index(){
        return view('frontend/home');
    }

    // showing single post

    public function single($token){
        return view('frontend/single');
    }

    // showing page

    public function page($token){
        return view('frontend/page');
    }
}

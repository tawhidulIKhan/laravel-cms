<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Show Dashboard

    public function dashboardShow(){
        return view('/backend/index');
    }
}

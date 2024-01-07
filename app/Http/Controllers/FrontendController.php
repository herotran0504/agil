<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class FrontendController extends Controller
{
    public function HomePage()
    {
        //return view('frontend_home');
        return redirect()->route('login');
    }
}

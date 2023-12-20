<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function landingPage(Request $request)
    {
        return view('index');
    }

    public function search()
    {
        return view('search');
    }

    public function info()
    {
        return view('info');
    }

    public function detail()
    {
        return view('detail');
    }
}

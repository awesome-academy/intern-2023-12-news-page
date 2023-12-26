<?php

namespace App\Http\Controllers;

class FollowController extends Controller
{
    public function index()
    {
        return view('auth/pages/follow/index');
    }
}

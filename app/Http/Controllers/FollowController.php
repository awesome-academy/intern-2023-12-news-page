<?php

namespace App\Http\Controllers;

class FollowController extends Controller
{
    public function indexAuth()
    {
        return view('auth/pages/follow/index');
    }
}

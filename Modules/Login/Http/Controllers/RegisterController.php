<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login::pages.register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'username' => 'string|max:255|unique:users',
            'email' => 'string|max:320|unique:users',
            'password' => 'string|min:6|confirmed',
            'password_confirmation' => 'string|min:6|confirmed',
        ]);
    }
}

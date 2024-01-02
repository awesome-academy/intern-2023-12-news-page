<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request, $language): RedirectResponse
    {
        Session::put('lang', $language);

        return redirect()->back();
    }
}

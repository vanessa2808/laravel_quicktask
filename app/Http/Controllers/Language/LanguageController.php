<?php

namespace App\Http\Controllers\Language;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }
}

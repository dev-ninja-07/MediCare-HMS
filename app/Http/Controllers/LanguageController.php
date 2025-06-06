<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        if (!in_array($locale, ['en', 'ar', 'tr'])) {
            $locale = 'en';
        }
        
        App::setLocale($locale);
        session()->put('locale', $locale);
        
        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Session;

class LocaleController extends Controller
{
    /**
     * @param string $locale
     * @return RedirectResponse
     */
    public function index(string $locale): RedirectResponse
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function kontakt()
    {
        return view('pages.kontakt');
    }

    public function anfahrt()
    {
        return view('pages.anfahrt');
    }

    public function impressum()
    {
        return view('pages.impressum');
    }

    public function ueberUns()
    {
        return view('pages.ueber-uns');
    }

    public function service()
    {
        return view('pages.service');
    }
}

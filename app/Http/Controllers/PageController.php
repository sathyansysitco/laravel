<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $title = "Welcome to My Laravel App";
        $features = ['Fast', 'Secure', 'Scalable'];

        return view('index', compact('title', 'features'));
    }

    public function about()
    {

        return view('about');
    }

    public function map()
    {

        return view('map');
    }
}

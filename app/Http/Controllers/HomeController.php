<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showPage()
    {
        return view('home');
    }
}

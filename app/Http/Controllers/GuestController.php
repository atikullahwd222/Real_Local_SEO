<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function bad_site_checker()
    {
        return view('bad-side-checker');
    }

    public function url_protocol()
    {
        return view('url-protocol');
    }
}

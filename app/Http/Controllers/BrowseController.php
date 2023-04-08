<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function index(Request $request)
    {
        return view('browse');
    }
}

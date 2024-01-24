<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function url_form($url)
    {
        $data = DB::table('url_form')->where('short_url', $url)->first();
        if ($data) {
            header('Location: ' . $data->long_url);
            die();
        } else {
            return "URL tidak ditemukan";
        }
    }
}

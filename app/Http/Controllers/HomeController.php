<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->limit(3)->get();
        // dd(Auth::user());
        return view('home', compact('news'));
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

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;

class NewsController extends Controller
{
    public function View_News(Request $request)
    {
        $news = news::get();
        return view('frontend.news')->with([
            'news'=> $news
        ]);
    }
}

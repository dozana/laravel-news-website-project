<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function allNewsPost()
    {
        $all_news_post = NewsPost::latest()->get();
        return view('backend.news.all_news_post', compact('all_news_post'));
    }

    public function addNewsPost()
    {

    }

    public function storeNewsPost()
    {

    }

    public function editNewsPost()
    {

    }

    public function updateNewsPost()
    {

    }

    public function deleteNewsPost()
    {

    }
}

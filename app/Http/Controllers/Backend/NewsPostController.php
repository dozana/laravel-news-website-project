<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\User;
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
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $admin_user = User::where('role','admin')->latest()->get();

        return view('backend.news.add_news_post', compact('categories', 'subcategories', 'admin_user'));
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

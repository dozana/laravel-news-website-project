<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        // popular news
        $new_news_post = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $news_popular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.index', compact('new_news_post', 'news_popular'));
    }

    public function newsDetails($id, $slug)
    {
        $news = NewsPost::findOrFail($id);

        $tags = $news->tags;
        $tags_all = explode(',', $tags);

        $category_id = $news->category_id;
        $related_news = NewsPost::where('category_id', $category_id)->where('id','!=', $id)->orderBy('id','DESC')->limit(6)->get();

        // view count
        $news_key = 'blog' . $news->id;
        if(!Session::has($news_key)) {
            $news->increment('view_count');
            Session::put($news_key, 1);
        }

        // popular news
        $new_news_post = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $news_popular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.news_details', compact('news', 'tags_all', 'related_news', 'new_news_post', 'news_popular'));
    }

    public function categoryWiseNews($id, $slug)
    {
        $news = NewsPost::where('status', 1)->where('category_id', $id)->orderBy('id','DESC')->get();

        return view('frontend.news.news_category', compact('news'));
    }
}

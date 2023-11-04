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
        return view('frontend.index');
    }

    public function newsDetails($id, $slug)
    {
        $news = NewsPost::findOrFail($id);

        $tags = $news->tags;
        $tags_all = explode(',', $tags);

        $category_id = $news->category_id;
        $related_news = NewsPost::where('category_id', $category_id)->where('id','!=', $id)->orderBy('id','DESC')->limit(6)->get();

        $news_key = 'blog' . $news->id;
        if(!Session::has($news_key)) {
            $news->increment('view_count');
            Session::put($news_key, 1);
        }

        return view('frontend.news.news_details', compact('news', 'tags_all', 'related_news'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Review;
use App\Models\Subcategory;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        // popular news
        $new_news_post = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $news_popular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_news_0 = NewsPost::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->limit(5)->get();

        $skip_category_2 = Category::skip(2)->first();
        $skip_news_2 = NewsPost::where('status', 1)->where('category_id', $skip_category_2->id)->orderBy('id', 'DESC')->limit(6)->get();

        return view('frontend.index', compact('new_news_post', 'news_popular', 'skip_category_0', 'skip_news_0', 'skip_category_2', 'skip_news_2'));
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

        $review = Review::where('news_id', $news->id)->latest()->limit(5)->get();

        return view('frontend.news.news_details', compact('news', 'tags_all', 'related_news', 'new_news_post', 'news_popular', 'review'));
    }

    public function categoryWiseNews($id, $slug)
    {
        $news = NewsPost::where('status', 1)->where('category_id', $id)->orderBy('id','DESC')->get();
        $breadcrumb_category = Category::where('id', $id)->first();
        $news_two = NewsPost::where('status', 1)->where('category_id', $id)->orderBy('id','DESC')->limit(2)->get();

        // popular news
        $new_news_post = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $news_popular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.news_category', compact('news','breadcrumb_category','news_two','new_news_post','news_popular'));
    }

    public function subcategoryWiseNews($id, $slug)
    {
        $news = NewsPost::where('status', 1)->where('subcategory_id', $id)->orderBy('id','DESC')->get();
        $breadcrumb_subcategory = Subcategory::where('id', $id)->first();
        $news_two = NewsPost::where('status', 1)->where('subcategory_id', $id)->orderBy('id','DESC')->limit(2)->get();

        // popular news
        $new_news_post = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $news_popular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.news_subcategory', compact('news','breadcrumb_subcategory','news_two','new_news_post','news_popular'));
    }

    public function searchByDate(Request $request)
    {
        $date = new DateTime($request->date); // yyyy-mm-dd
        $format_date = $date->format('d-m-Y'); // dd-mm-yyyy
        $news = NewsPost::where('post_date', $format_date)->latest()->get();

        // popular news
        $new_news_post = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $news_popular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.search_by_date', compact('news','format_date', 'new_news_post', 'news_popular'));
    }

    public function newsSearch(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $item = $request->search;
        $news = NewsPost::where('news_title', 'LIKE', "%$item%")->get();

        // popular news
        $new_news_post = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $news_popular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.search', compact('news','new_news_post','news_popular','item'));
    }

    public function reporterNews($id)
    {
        $reporter = User::findOrFail($id);
        $news = NewsPost::where('user_id', $id)->get();

        return view('frontend.reporter.reporter_news_post', compact('reporter', 'news'));
    }
}

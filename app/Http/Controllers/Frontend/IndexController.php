<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function newsDetails($id, $slug)
    {
        $news = NewsPost::findOrFail($id);

        return view('frontend.news.news_details', compact('news'));
    }
}

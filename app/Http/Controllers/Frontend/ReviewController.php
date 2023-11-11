<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function storeReview(Request $request)
    {
        $news_id = $request->news_id;

        $request->validate([
           'comment' => 'required'
        ]);

        Review::insert([
            'news_id' => $news_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('status', 'Review will approve by Admin');
    }
}

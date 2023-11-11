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

    public function pendingReview()
    {
        $review = Review::where('status', 0)->orderBy('id','DESC')->get();

        return view('backend.review.pending_review', compact('review'));
    }

    public function reviewApprove($id)
    {
        Review::where('id', $id)->update([
            'status' => 1
        ]);

        $notification = [
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function approveReview()
    {
        $review = Review::where('status', 1)->orderBy('id','DESC')->get();

        return view('backend.review.approve_review', compact('review'));
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();

        $notification = [
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

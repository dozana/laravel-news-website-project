<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class VideoGalleryController extends Controller
{
    public function allVideoGallery()
    {
        $video = VideoGallery::latest()->get();

        return view('backend.video-gallery.all_video', compact('video'));
    }

    public function addVideoGallery()
    {
        return view('backend.video-gallery.add_video');
    }

    public function storeVideoGallery(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'url' => 'required'
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(784,436)->save('upload/video_gallery/'.$name_gen);
        $save_url = 'upload/video_gallery/'.$name_gen;

        VideoGallery::insert([
            'video_title' => $request->title,
            'video_url' => $request->url,
            'post_date' => Carbon::now()->format('d F Y'),
            'video_image' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'News Video Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.video.gallery')->with($notification);
    }

    public function editVideoGallery($id)
    {

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

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
}

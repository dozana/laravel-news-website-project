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
        $video = VideoGallery::findOrFail($id);

        return view('backend.video-gallery.edit_video', compact('video'));
    }

    public function updateVideoGallery(Request $request)
    {
        $video = VideoGallery::findOrFail($request->id);

        // Check if a new image file is provided
        if ($request->hasFile('image')) {
            // Get the old photo's path
            $old_photo_path = $video->video_image;

            // Delete the old photo file from the server
            if (file_exists($old_photo_path)) {
                unlink($old_photo_path);
            }

            // Upload and save the new photo
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('upload/video_gallery/' . $name_gen);
            $save_url = 'upload/video_gallery/' . $name_gen;

            // Update the photo record in the database
            $video->update([
                'video_title' => $request->title,
                'video_url' => $request->url,
                'post_date' => Carbon::now()->format('d F Y'),
                'video_image' => $save_url
            ]);

            $notification = [
                'message' => 'Video Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.video.gallery')->with($notification);
        } else {
            return redirect()->route('all.video.gallery');
        }
    }

    public function deleteVideoGallery($id)
    {
        $video_gallery = VideoGallery::findOrFail($id);
        $image = $video_gallery->video_image;
        unlink($image);

        VideoGallery::findOrFail($id)->delete();

        $notification = [
            'message' => 'Video Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

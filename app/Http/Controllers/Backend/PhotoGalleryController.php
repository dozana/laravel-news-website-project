<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PhotoGallery;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    public function allPhotoGallery()
    {
        $photo = PhotoGallery::latest()->get();

        return view('backend.photo-gallery.all_photo', compact('photo'));
    }

    public function addPhotoGallery()
    {
        return view('backend.photo-gallery.add_photo');
    }

    public function storePhotoGallery(Request $request)
    {
        $images = $request->file('multi_image');

        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('upload/photo_gallery/'.$name_gen);
            $save_url = 'upload/photo_gallery/'.$name_gen;

            PhotoGallery::insert([
                'photo_gallery' => $save_url,
                'post_date' => Carbon::now()->format('d F Y')
            ]);
        }

        $notification = [
            'message' => 'Photo Gallery Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.photo.gallery')->with($notification);
    }
}

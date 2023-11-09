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

    public function editPhotoGallery($id)
    {
        $photo_gallery = PhotoGallery::findOrFail($id);

        return view('backend.photo-gallery.edit_photo', compact('photo_gallery'));
    }

    public function updatePhotoGallery(Request $request, $id)
    {
        // Find the existing photo record
        $photo = PhotoGallery::findOrFail($id);

        // Check if a new image file is provided
        if ($request->file('multi_image')) {
            // Get the old photo's path
            $old_photo_path = $photo->photo_gallery;

            // Delete the old photo file from the server
            if (file_exists($old_photo_path)) {
                unlink($old_photo_path);
            }

            // Upload and save the new photo
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('upload/photo_gallery/' . $name_gen);
            $save_url = 'upload/photo_gallery/' . $name_gen;

            // Update the photo record in the database
            $photo->update([
                'photo_gallery' => $save_url,
                'post_date' => Carbon::now()->format('d F Y')
            ]);

            $notification = [
                'message' => 'Photo Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.photo.gallery')->with($notification);
        }
    }
}

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
        $request->validate([
            'multi_image' => 'required',
        ]);

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

    public function updatePhotoGallery(Request $request)
    {
        $photo = PhotoGallery::findOrFail($request->id);

        // Check if a new image file is provided
        if ($request->hasFile('multi_image')) {
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
        } else {
            return redirect()->route('all.photo.gallery');
        }
    }

    public function deletePhotoGallery($id)
    {
        $photo = PhotoGallery::findOrFail($id);
        $img = $photo->photo_gallery;
        unlink($img);

        PhotoGallery::findOrFail($id)->delete();

        $notification = [
            'message' => 'Photo Gallery Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

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
}

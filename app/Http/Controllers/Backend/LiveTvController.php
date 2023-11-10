<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LiveTv;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class LiveTvController extends Controller
{
    public function editLiveTv()
    {
        $live = LiveTv::findOrFail(1);

        return view('backend.live-tv.edit_live_tv', compact('live'));
    }

    public function updateLiveTv(Request $request)
    {
        $request->validate([
            'live_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'live_url' => 'required',
        ]);

        $liveId = $request->id;

        // Find the existing live TV record
        $live = LiveTv::findOrFail($liveId);

        // Check if a new image file is being uploaded
        if ($request->file('live_image')) {
            // Delete the old image file
            $this->deleteImageFile($live->live_image);

            // Upload and save the new photo
            $image = $request->file('live_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('upload/live_tv/' . $name_gen);
            $saveUrl = 'upload/live_tv/' . $name_gen;

            // Update the live TV record in the database
            $live->update([
                'live_url' => $request->live_url,
                'post_date' => Carbon::now()->format('d F Y'),
                'live_image' => $saveUrl,
            ]);

            $notification = [
                'message' => 'Live TV Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        } else {
            // Update the live TV record without changing the image
            $live->update([
                'live_url' => $request->live_url,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);

            $notification = [
                'message' => 'Live TV Updated Without Image Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }

    private function deleteImageFile($filePath)
    {
        if (file_exists($filePath) && is_file($filePath)) {
            // Delete the file
            unlink($filePath);
        }
    }
}

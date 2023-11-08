<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function allBanner()
    {
        $banner = Banner::findOrFail(1);

        return view('backend.banner.banner_update', compact('banner'));
    }

    public function updateBanner(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        /*
        if ($request->file('home_one')) {
            $image1 = $request->file('home_one');
            @unlink(public_path($banner->home_one));
            $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->resize(725, 100)->save('upload/banner/' . $name_gen1);
            $banner->update(['home_one' => 'upload/banner/' . $name_gen1]);
        }

        if ($request->file('home_two')) {
            $image2 = $request->file('home_two');
            @unlink(public_path($banner->home_two));
            $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(725, 100)->save('upload/banner/' . $name_gen2);
            $banner->update(['home_two' => 'upload/banner/' . $name_gen2]);
        }

        if ($request->file('home_three')) {
            $image3 = $request->file('home_three');
            @unlink(public_path($banner->home_three));
            $name_gen3 = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            Image::make($image3)->resize(725, 100)->save('upload/banner/' . $name_gen3);
            $banner->update(['home_three' => 'upload/banner/' . $name_gen3]);
        }

        if ($request->file('home_four')) {
            $image4 = $request->file('home_four');
            @unlink(public_path($banner->home_four));
            $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalExtension();
            Image::make($image4)->resize(725, 100)->save('upload/banner/' . $name_gen4);
            $banner->update(['home_four' => 'upload/banner/' . $name_gen4]);
        }

        if ($request->file('news_category_one')) {
            $image5 = $request->file('news_category_one');
            @unlink(public_path($banner->news_category_one));
            $name_gen5 = hexdec(uniqid()) . '.' . $image5->getClientOriginalExtension();
            Image::make($image5)->resize(725, 100)->save('upload/banner/' . $name_gen5);
            $banner->update(['news_category_one' => 'upload/banner/' . $name_gen5]);
        }

        if ($request->file('news_details_one')) {
            $image6 = $request->file('news_details_one');
            @unlink(public_path($banner->news_details_one));
            $name_gen6 = hexdec(uniqid()) . '.' . $image6->getClientOriginalExtension();
            Image::make($image6)->resize(725, 100)->save('upload/banner/' . $name_gen6);
            $banner->update(['news_details_one' => 'upload/banner/' . $name_gen6]);
        }
        */

        $image_fields = [
            'home_one',
            'home_two',
            'home_three',
            'home_four',
            'news_category_one',
            'news_details_one',
        ];

        foreach ($image_fields as $field) {
            if ($request->hasFile($field)) {
                $image = $request->file($field);
                $image_path = 'upload/banner/' . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

                // Delete the old image if it exists
                if (file_exists(public_path($banner->$field))) {
                    @unlink(public_path($banner->$field));
                }

                // Resize and save the new image
                Image::make($image)->resize(725, 100)->save($image_path);

                // Update the field in the database
                $banner->update([$field => $image_path]);
            }
        }

        $notification = [
            'message' => 'Banner Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}

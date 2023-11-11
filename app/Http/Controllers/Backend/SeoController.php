<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function editSeo()
    {
        $seo = Seo::findOrFail(1);

        return view('backend.seo.edit_seo', compact('seo'));
    }

    public function updateSeo(Request $request)
    {
        $request->validate([
            'meta_title' => 'required',
            'meta_author' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);

        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        $notification = [
            'message' => 'SEO Settings Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

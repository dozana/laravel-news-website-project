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

        dd($request->all());

    }
}

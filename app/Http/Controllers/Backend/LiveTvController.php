<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LiveTv;
use Illuminate\Http\Request;

class LiveTvController extends Controller
{
    public function updateLiveTv()
    {
        $live = LiveTv::findOrFail(1);

        return view('backend.live-tv.edit_tv', compact('live'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        $id = Auth::user()->id;
        $user_data = User::find($id);

        return view('frontend.user_dashboard', compact('user_data'));
    }
}

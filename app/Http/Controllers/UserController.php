<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userDashboard()
    {
        $id = Auth::user()->id;
        $user_data = User::find($id);

        return view('frontend.user_dashboard', compact('user_data'));
    }

    public function userProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $file_name = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $file_name);
            $data['photo'] = $file_name;
        }

        $data->save();

        return redirect()->back()->with('status', 'Profile Updated Successfully');
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'User Logout Successfully');
    }

    public function userChangePassword()
    {
        $id = Auth::user()->id;
        $user_data = User::find($id);

        return view('frontend.user_change_password', compact('user_data'));
    }

    public function userUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match the old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with('error', "Old Password doesn't match!");
        }

        // Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('status', "Password changed successfully.");
    }
}

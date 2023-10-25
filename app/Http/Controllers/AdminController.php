<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.index');
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = [
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'info'
        ];

        return redirect('/admin/logout/page')->with($notification);
    }

    public function adminLogin()
    {
        $notification = [
            'message' => 'Admin Login Successfully',
            'alert-type' => 'info'
        ];

        return view('admin.admin_login')->with($notification);
    }

    public function adminLogoutPage()
    {
        return view('admin.admin_logout');
    }

    public function adminProfile()
    {
        $id = Auth::user()->id;
        $admin_data = User::find($id);

        return view('admin.admin_profile_view', compact('admin_data'));
    }

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $file_name = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $file_name);
            $data['photo'] = $file_name;
        }

        $data->save();

        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function adminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function adminUpdatePassword(Request $request)
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

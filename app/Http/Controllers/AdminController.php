<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $news_post = NewsPost::all();
        $active_news = NewsPost::where('status', 1)->get();
        $inactive_news = NewsPost::where('status', 0)->get();
        $breaking_news = NewsPost::where('breaking_news', 1)->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();

        return view('admin.index', compact('news_post','active_news', 'inactive_news', 'breaking_news', 'categories', 'subcategories', 'admins', 'users'));
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

    public function allAdmin()
    {
        $admins = User::where('role','admin')->latest()->get();
        return view('backend.admin.admin_all', compact('admins'));
    }

    public function addAdmin()
    {
        $roles = Role::all();

        return view('backend.admin.admin_add', compact('roles'));
    }

//    public function storeAdmin(Request $request)
//    {
//        $request->validate([
//            'role' => 'required',
//            'name' => 'required',
//            'username' => 'required',
//            'email' => 'required',
//            'password' => 'required',
//            'phone' => 'required'
//        ]);
//
//        $user = new User();
//        $user->name = $request->name;
//        $user->username = $request->username;
//        $user->email = $request->email;
//        $user->password = Hash::make($request->password);
//        $user->phone = $request->phone;
//        $user->role = 'admin';
//        $user->status = 'inactive';
//        $user->save();
//
//        if($request->role) {
//            $user->assignRole($request->role);
//        }
//
//        $notification = [
//            'message' => 'New Admin User Created Successfully',
//            'alert-type' => 'success'
//        ];
//
//        return redirect()->route('all.admin')->with($notification);
//    }


    public function storeAdmin(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'admin',
            'status' => 'inactive',
        ]);

        if ($request->role) {
            $user->assignRole($request->role);
        }

        $notification = [
            'message' => 'New Admin User Created Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admin')->with($notification);
    }

    public function editAdmin($id)
    {
        $admin = User::findOrFail($id);
        $roles = Role::all();

        return view('backend.admin.admin_edit', compact('admin', 'roles'));
    }

    public function updateAdmin(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $admin_user_id = $request->id;

        // Find the user by ID
        $user = User::findOrFail($admin_user_id);

        /*
        $user = User::findOrFail($admin_user_id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();
        */

        // Update the user attributes
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'admin',
            'status' => 'inactive'
        ]);

        // Detach existing roles
        $user->roles()->detach();

        // Assign the new role
        if ($request->role) {
            $user->assignRole($request->role);
        }

        $notification = [
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admin')->with($notification);
    }

    public function deleteAdmin($id)
    {
        User::findOrFail($id)->delete();

        $notification = [
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function inactiveAdminUser($id)
    {
        User::findOrFail($id)->update([
            'status' => 'inactive'
        ]);

        $notification = [
            'message' => 'Admin User Inactive',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function activeAdminUser($id)
    {
        User::findOrFail($id)->update([
            'status' => 'active'
        ]);

        $notification = [
            'message' => 'Admin User Active',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

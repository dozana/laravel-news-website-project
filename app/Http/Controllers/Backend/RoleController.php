<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allPermission()
    {
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permission'));
    }

    public function addPermission()
    {
        return view('backend.pages.permission.add_permission');
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);

        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'message' => 'Permission Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);

        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function updatePermission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);

        $permission_id = $request->id;

        Permission::findOrFail($permission_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function deletePermission($id)
    {
        Permission::findOrFail($id)->delete();

        $notification = [
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}

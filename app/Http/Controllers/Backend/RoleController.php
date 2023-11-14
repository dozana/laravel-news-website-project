<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allRole()
    {
        $role = Role::all();
        return view('backend.pages.roles.all_roles', compact('role'));
    }

    public function addRole()
    {
        return view('backend.pages.roles.add_role');
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Role Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.role')->with($notification);
    }

    public function editRole($id)
    {
        $permission = Permission::findOrFail($id);

        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function updateRole(Request $request)
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

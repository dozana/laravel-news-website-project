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
        $role = Role::findOrFail($id);

        return view('backend.pages.roles.edit_role', compact('role'));
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.role')->with($notification);
    }

    public function deleteRole($id)
    {
        Role::findOrFail($id)->delete();

        $notification = [
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}

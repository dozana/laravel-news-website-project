<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function addRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('backend.pages.roles.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function storeRolePermission(Request $request)
    {
        $data = [];
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = [
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function allRolesPermission()
    {
        $roles = Role::all();

        return view('backend.pages.roles.all_roles_permission', compact('roles'));
    }
}

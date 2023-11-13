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
}

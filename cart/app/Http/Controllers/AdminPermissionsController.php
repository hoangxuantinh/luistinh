<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permission;

class AdminPermissionsController extends Controller
{
    public function index() {
        return view('admins.permission.add');
    }
    public function store(Request $request) {
     
        $permission = permission::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0,
            'key_code' => '',
        ]);
        foreach($request->module_child as $valueItem) {
            permission::create([
                'name' => $valueItem,
                'display_name' => $valueItem,
                'parent_id' => $permission->id,
                'key_code' => $request->module_parent. '_' . $valueItem,
            ]);
        }
    }
}

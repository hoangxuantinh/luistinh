<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permission;

class permissionController extends Controller
{
    public function add() {
        return view('admins.permission.add');
    }
    public function store(Request $request) {
        $permission = permission::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0,
            'key_code'=> '',
        ]);
        foreach($request->module_childrent as $moduleChildrent){
            permission::create([
                'name' => $moduleChildrent,
                'display_name' => $moduleChildrent,
                'parent_id' => $permission->id,
                'key_code' => $request->module_parent . '_'. $moduleChildrent,
            ]);
        }
        
    }
}

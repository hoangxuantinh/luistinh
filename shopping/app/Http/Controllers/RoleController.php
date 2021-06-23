<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
use App\Models\permission;
use Illuminate\Support\Facades\Log;
use App\Traits\deleteModeTrait;


class RoleController extends Controller
{
    use deleteModeTrait;
    private $role;
    private $permission;
    public function __construct(role $role,permission $permission) {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index() {
        $roles = $this->role->paginate(5);
        return view('admins.roles.index',compact('roles'));
    }
    public function create() {
        $permissionParents = $this->permission->where('parent_id',0)->get();
        return view('admins.roles.add',compact('permissionParents'));
    }
    public function store(Request $request) {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('role.index');
    }
    public function edit($id) {
        $permissionParents = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $permissionsOfRole = $role->permissions()->get();
        return view('admins.roles.edit',compact('role','permissionParents','permissionsOfRole'));
    }
    public function update($id,Request $request) {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role->permissions()->sync($request->permission_id);
        
        return redirect()->route('role.index',compact('role'));
    }
    public function delete($id,Request $request) {
        $role = $this->role->find($id);
        $role->permissions()->detach($request->permission_id);
        return $this->deleteModeTrait($id,$this->role);

    }
}

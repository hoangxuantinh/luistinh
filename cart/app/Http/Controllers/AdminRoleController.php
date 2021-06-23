<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
use App\Models\permission;
use App\Traits\DeleteModelTrait;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
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
        $permissionParent = $this->permission->where('parent_id',0)->get();
        
        return view('admins.roles.add',compact('permissionParent'));
    }
    public function store(Request $request) {
       
        $roles = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $roles->permission()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function edit($id) {
        $roleEdit = $this->role->find($id);
        $permissionParent = $this->permission->where('parent_id',0)->get();
        $permissionCheck = $roleEdit->permission;
        return view('admins.roles.edit',compact('roleEdit','permissionParent','permissionCheck'));
    }
    public function update(Request $request, $id ) {
        $roles = $this->role->find($id);
        $roles->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $roles->permission()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function delete($id,Request $request) {
        $roles = $this->role->find($id);
        $roles->permission()->detach($request->permission_id);
        return $this->deleteModelTrait($id,$this->role);
    }
}

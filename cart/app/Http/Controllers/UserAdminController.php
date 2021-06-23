<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use App\Http\Requests\UserAdminRequest;
use App\Traits\DeleteModelTrait;
use Hash;
use Log;
use DB;
use Illuminate\Support\Collection;

class UserAdminController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    
    public function __construct(User $user,role $role) {
        $this->user = $user;
        $this->role = $role;
    }
    public function index() {
        
        $users = $this->user->paginate(5);
        return view('admins.users.index',compact('users'));
    }
    public function create() {
        $roles = $this->role->all();
        return view('admins.users.add',compact('roles'));
    }
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $user = $this->user->create($data);
            $roleId = $request->role_id;
            $user->roles()->attach($roleId);
            DB::commit();
            return redirect()->route('users.index');

        }catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' .$exception->getMessage() . '---Line:   ' .$exception->getLine() );
        }
    }
    public function edit($id) {
        $roles = $this->role->all();
        $userEdit = $this->user->find($id);
        $roleOfUser = $userEdit->roles;
        // dd($roleOfUser);
        return view('admins.users.edit',compact('roles','userEdit','roleOfUser'));
    }
    public function update(Request $request,$id) {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            //method update sẽ trả về boolean
            $this->user->find($id)->update($data);
            $user = $this->user->find($id);
            $roleId = $request->role_id;
            $user->roles()->detach();
            $user->roles()->attach($roleId);
            DB::commit();
            return redirect()->route('users.index');

        }catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' .$exception->getMessage() . '---Line:   ' .$exception->getLine() );
        }
    }
    public function delete($id) {
        return $this->deleteModelTrait($id,$this->user);
    }
}

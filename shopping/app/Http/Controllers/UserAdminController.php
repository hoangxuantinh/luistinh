<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\role;
use Illuminate\Support\Facades\DB;
use App\Traits\deleteModeTrait;
use Illuminate\Support\Facades\Log;

use Hash;
class UserAdminController extends Controller
{
    use deleteModeTrait;
    private $user;
    private $role;
    public function __construct(User $user,role $role) {
        $this->user = $user;
        $this->role = $role;
    }
    public function index() {
        $users = $this->user->latest()->paginate(5);
        return view('admins.users.index',compact('users'));
    }
    public function create() {
        $roles = role::all();
        return view('admins.users.add',compact('roles'));
    }
    public function store(Request $request) {
        try{
            DB::beginTransaction();
            $user =  $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $roleID = $request->role_id;
            $user->roles()->attach($roleID);
            DB::commit();
            return redirect()->route('user.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() .'----Line : '.$exception->getLine() );
        }
        
    }
    public function edit($id) {
        $roles = role::all();
        $user = $this->user->find($id);
        $roleOfUser = $user->roles;
        return view('admins.users.edit',compact('user','roles','roleOfUser'));
    }
    public function update($id,Request $request) {
        try{
            DB::beginTransaction();
            $user =  $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $roleID = $request->role_id;
            $this->user->find($id)->roles()->sync($roleID);
            DB::commit();
            return redirect()->route('user.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() .'----Line : '.$exception->getLine() );
        }
    }
    public function delete($id) {
        return $this->deleteModeTrait($id,$this->user);

    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles() {
        return $this->belongsToMany(role::class,'user_role','user_id','role_id');
    }
    public function checkPermissionAcess($permissionCheck) {
        // lấy ra các quyền của user login vào hệ thống
        $roles = auth()->user()->roles;
        foreach($roles as $role) {
            $permissions = $role->permission;
           
            if( $permissions->contains('key_code',$permissionCheck) ){
                return true;
            }
        }
        return false;
    }

}

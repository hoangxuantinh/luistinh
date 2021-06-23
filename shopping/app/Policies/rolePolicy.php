<?php

namespace App\Policies;

use App\Models\User;
use App\Models\role;
use Illuminate\Auth\Access\HandlesAuthorization;

class rolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->permissionsAccess('role_list');
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->permissionsAccess('role_add');
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->permissionsAccess('role_edit');
        
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->permissionsAccess('role_delete');
        
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return mixed
     */
    public function restore(User $user, role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return mixed
     */
    public function forceDelete(User $user, role $role)
    {
        //
    }
}

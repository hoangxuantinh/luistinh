<?php

namespace App\Policies;

use App\Models\User;
use App\Models\product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->permissionsAccess('product_list');
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->permissionsAccess('product_add');
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function update(User $user,$id)
    {
        $product = product::find($id);
        if( $user->permissionsAccess('product_edit') && $user->id === $product->user_id) {
            return true;
        }else{

            return false;
        }
        
        
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->permissionsAccess('product_delete');
        
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function restore(User $user, product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function forceDelete(User $user, product $product)
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\user;
use App\Policies\CategoryPolicy;
use App\Policies\productPolicy;
use App\Policies\rolePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->categoryPolicy();
        $this->productPolicy();
        $this->rolePolicy();
        
    }
    public function categoryPolicy() {
        Gate::define('list-category',[CategoryPolicy::class,'view']);
        Gate::define('add-category',[CategoryPolicy::class,'create']);
        Gate::define('edit-category',[CategoryPolicy::class,'update']);
        Gate::define('delete-category',[CategoryPolicy::class,'delete']);
    }
    public function productPolicy() {
        Gate::define('list-product',[ProductPolicy::class,'view']);
        Gate::define('add-product',[ProductPolicy::class,'create']);
        Gate::define('edit-product',[ProductPolicy::class,'update']);
        Gate::define('delete-product',[ProductPolicy::class,'delete']);
    }
    public function rolePolicy() {
        Gate::define('list-role',[rolePolicy::class,'view']);
        Gate::define('add-role',[rolePolicy::class,'create']);
        Gate::define('edit-role',[rolePolicy::class,'update']);
        Gate::define('delete-role',[rolePolicy::class,'delete']);
    }
}

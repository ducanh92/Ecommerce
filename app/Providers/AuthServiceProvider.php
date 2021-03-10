<?php

namespace App\Providers;

use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define Gates and Policies
        
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess;
        $permissionGateAndPolicy->setGateAndPolicyAccess();

        Gate::define('product-edit', function($user, $product) {

            if($user->checkPermissionAccess(config('permissions.access.product-edit'))) {
                return true;
            }

            return false;
        });

        Gate::define('access-admin', function($user) {
            foreach($user->roles as $role) {
                if($role->name == 'admin') {
                    return true;
                }
            }
            return false;
        });
        
    }

    
}

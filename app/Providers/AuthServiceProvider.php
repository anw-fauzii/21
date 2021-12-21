<?php

namespace App\Providers;

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

        //
        Gate::define('isAdmin', function($user) {
            return $user->roles == 'Admin';
         });
     
         // define a author user role
         // returns true if user role is set to author
         Gate::define('isOperator', function($user) {
             return $user->roles == 'Operator';
         });

        Gate::define('isUser', function($user) {
            return $user->roles == 'User' && $user->status == 'aktif';
        });

        Gate::define('isUserWaiting', function($user) {
            return $user->roles == 'User' && $user->status == 'menunggu';
        });

    
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Admin;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\User' => 'App\Policies\AdminPolicy',
        //'App\Model' => 'App\Policies\HostPolicy',
        //'App\Model' => 'App\Policies\StudentPolicy',
        //'App\Model' => 'App\Policies\PartnerPolicy',
        //User::class => AdminPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        foreach ($this->listPermissions() as $permission)
        {
            Gate::define($permission->name, function($user) use($permission)
            {
                return $user->hasRole($permission->roles);
            });
        }

    }
    /*
        Gate::define('index-Student',function($user){
            return $user->isStudent();
        });

        Gate::define('index-Host',function($user){
            return $user->isHost();
        });

        Gate::define('index-Partner',function($user){
            return $user->isPartner();
        });
        */  
    

    public function listPermissions()
    {
        return Permission::with('roles')->get();
    }
}

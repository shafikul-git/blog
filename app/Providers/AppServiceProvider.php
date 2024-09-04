<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define('admin', function(User $user){
            return $user->role === 1;
        });

        Gate::define('editor', function(User $user){
            return $user->role === 2;
        });

        Gate::define('commentor', function (User $user){
            return $user->role === 3;
        });

        Gate::define('administrator', function (User $user){
            return in_array($user->role, [1,2,3]);
        });

        Gate::define('AdminAndEditor', function (User $user){
            return in_array($user->role, [1,2]);
        });

        Gate::define('checkPermission', function(User $user, $permissionId){
            if(Gate::forUser($user)->allows('AdminAndEditor', $permissionId)){
                return true;
            }
            return $user->id === $permissionId;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

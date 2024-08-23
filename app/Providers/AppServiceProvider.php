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
        Gate::define('AdminOrEditor', function (User $user){
            return in_array($user->role, ['admin', 'editor']);
        });
        Gate::define('commentor', function (User $user){
            return $user->role === 'commentor';
        });

        Gate::define('administrator', function (User $user){
            return in_array($user->role, ['admin', 'editor', 'commentor']);
        });

        Gate::define('checkPermission', function(User $user, $permissionId){
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

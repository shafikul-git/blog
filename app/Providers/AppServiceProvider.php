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

        Gate::define('checkPermission', function(User $user, $permission){
            return $user->id === $permission;
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

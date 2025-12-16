<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');
        Gate::define('delete-trip', function (User $user, Trip $trip) {
            return $user->email === 'alpha@test.com';
        });

        Gate::define('update-trip', function (User $user, Trip $trip) {
            return $user->email === 'alpha@test.com';
        });
    }
}

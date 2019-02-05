<?php

namespace App\Providers;

use App\Composers\DashboardComposer;
use App\Composers\MonitorComposer;
use App\Models\Notation;
use App\Observers\NotationObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // View composers
        view()->composer(['monitor.*', 'welcome', 'home'], MonitorComposer::class);
        view()->composer(['home'], DashboardComposer::class);

        // Model observers
        Notation::observe(NotationObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

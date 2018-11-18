<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Composers\MonitorComposer;
use App\Models\Notation;
use App\Observers\NotationObserver;

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
        view()->composer(['monitor.*', 'welcome'], MonitorComposer::class);

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

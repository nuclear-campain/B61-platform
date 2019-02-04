<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{Signature, Notation};
use App\Composers\{MonitorComposer, DashboardComposer};
use App\Observers\{SignatureObserver, NotationObserver};

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
        Signature::observe(SignatureObserver::class);
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

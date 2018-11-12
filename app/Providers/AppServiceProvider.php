<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Composers\MonitorComposer;

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

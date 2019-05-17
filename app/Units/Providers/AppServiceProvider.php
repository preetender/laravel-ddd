<?php

namespace App\Units\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\DomainSupport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('domains', DomainSupport::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

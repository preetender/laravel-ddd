<?php

namespace App\Units\Providers;

use Illuminate\Support\ServiceProvider;
use App\C3\DomainSupport;
use Carbon\Carbon;

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
        Carbon::setLocale('pt-br');
    }
}

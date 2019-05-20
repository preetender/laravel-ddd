<?php

namespace App\Units\Providers;

use Illuminate\Support\ServiceProvider;
use App\C3\DomainSupport;
use Carbon\Carbon;
use Illuminate\Support\Collection;

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

        Collection::macro('findKey', function ($var, $default = null) {
            $keys = explode('.', $var);
            $data = $this->toArray();

            foreach ($keys as $key) {
                $data = array_key_exists($key, $data) ? $data[$key] : $default;
            }

            return $data;
        });
    }
}

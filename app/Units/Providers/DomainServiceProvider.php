<?php

namespace App\Units\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register
     * 
     * @return void
     */
    public function register(): void
    {
        //
        $this->registerDomainsConfig();
    }

    /**
     * Boot
     * 
     * @return void
     */
    public function boot(): void
    {
        //
        $this->registerDomainMigrations();
    }

    /**
     * Mesclar configurações dos dominios.
     * 
     * @return void
     */
    private function registerDomainsConfig(): void
    {
        foreach (app('domains')->loadConfigs() as $name => $path) {
            // domain::name
            $this->mergeConfigFrom($path, "domain::$name");
        }
    }


    /**
     * Carregar migrations
     * 
     * @return void
     */
    private function registerDomainMigrations()
    {
        foreach (app('domains')->loadMigrations() as $name => $path) {
            // Registrar migrations
            $this->loadMigrationsFrom($path);
        }
    }
}

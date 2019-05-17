<?php

namespace App\C3;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

class DomainSupport
{
    /**
     * Lista de dominios registrados.
     *
     * @var array
     */
    protected $list = [];

    /**
     * Configurações do projeto
     *
     * @var array
     */
    protected $config;

    /**
     * Estrutura das pastas
     *
     */
    protected $struct;

    public function __construct()
    {
        //
        $this->config = collect(config('domain'));
    }

    public function loadRoutes(): void
    {
        //
        $domains = $this->config->get('register');

        if (count($domains) <= 0) {
            throw new \Error('Não existem dominios registrados.');
        }

        foreach ($domains as $name => $namespace) {
            //
            // Routes
            //
            $web = str_finish($this->getPathByDomain($name, 'routes'), $this->config->get('routes')['web']);
            $api = str_finish($this->getPathByDomain($name, 'routes'), $this->config->get('routes')['api']);

            //
            // Web
            //
            if (file_exists(base_path($web))) {
                Route::prefix($name)
                    ->namespace("$namespace\\Http\\Controllers")
                    ->middleware('web')
                    ->group(base_path($web));
            }

            //
            // Api
            //
            if (file_exists(base_path($api))) {
                Route::prefix("api/$name")
                    ->namespace("$namespace\\Http\\Controllers")
                    ->middleware('api')
                    ->group(base_path($api));
            }
        }
    }

    /**
     *
     */
    private function getPathByDomain(string $name, $struct = 'entities')
    {
        if (!array_key_exists($name, $this->config['register'])) {
            throw new \Error("Dominio $name, não foi registrado.");
        }

        $base_path = $this->config['base_path'] . '/' . \ucfirst($name);
        $base_struct = $this->config['struct'];

        return "$base_path/$base_struct[$struct]/";
    }
}

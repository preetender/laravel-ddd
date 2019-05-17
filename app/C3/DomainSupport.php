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

    /**
     * Registrar rotas
     * 
     * @return void
     */
    public function loadRoutes(): void
    {
        //
        $domains = $this->config->get('register');

        if (count($domains) <= 0) {
            throw new \Error('Não existem dominios registrados.');
        }

        foreach ($domains as $name => $namespace) {

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
     * Carregar arquivos de configuração do dominio.
     * 
     * @return array
     */
    public function loadConfigs(): array
    {
        //
        $domains = $this->config->get('register');

        if (count($domains) <= 0) {
            throw new \Error('Não existem dominios registrados.');
        }

        $files = [];

        foreach ($domains as $name => $namespace) {
            $root_path = $this->config->get('base_path') . '/' . ucfirst($name);
            $config = base_path($root_path . '/' . 'config.php');

            if (!file_exists($config)) continue;

            $files[$name] = $config;
        }

        return $files;
    }

    /**
     * Carregar migrations do dominio
     * 
     * @return array
     */
    public function loadMigrations(): array
    {
        //
        $domains = $this->config->get('register');

        if (count($domains) <= 0) {
            throw new \Error('Não existem dominios registrados.');
        }

        $files = [];

        foreach ($domains as $name => $namespace) {
            // $root_path = $this->config->get('base_path') . '/' . ucfirst($name);
            $migrations = base_path($this->getPathByDomain($name, 'migrations'));

            if (!is_dir($migrations)) continue;

            $files[$name] = $migrations;
        }

        return $files;
    }

    /**
     * Obter caminho relativo
     * 
     * @return string
     */
    private function getPathByDomain(string $name, $struct = 'entities'): string
    {
        if (!array_key_exists($name, $this->config['register'])) {
            throw new \Error("Dominio $name, não foi registrado.");
        }

        $base_path = $this->config['base_path'] . '/' . \ucfirst($name);
        $base_struct = $this->config['struct'];

        return "$base_path/$base_struct[$struct]/";
    }
}

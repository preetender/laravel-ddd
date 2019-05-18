<?php

namespace App\C3\Auth;

use Laravel\Socialite\Facades\Socialite;

final class Factory
{
    /**
     * Configurações do dominio Auth.
     * 
     * @var array
     */
    protected $config = [];

    /**
     * Provedores aceitos.
     * 
     * @var array
     */
    protected $providers = [];

    /**
     * Provedor selecionado.
     * 
     * @var 
     */
    protected $provider;

    /**
     * @param string $provider
     */
    public function __construct(string $provider)
    {
        $this->config = (object)config("domain::auth");
        $this->providers = $this->config->providers;

        if (!$this->hasProvider($provider)) {
            throw new \Exception("Provedor $provider não foi configurado.");
        }

        $this->provider = Socialite::driver($provider);
    }

    /**
     * @param string $provider
     */
    public static function build(string $provider)
    {
        return new self($provider);
    }

    /**
     * Obter informações do usuario autenticado.
     * 
     * @return mixed
     */
    public function retrieveByToken(string $token, array $fields = [])
    {
        $user = $this->provider->userFromToken($token);
        $data = [];
        if (count($fields) > 0) {
            foreach ($fields as $field) {
                $data[$field] = $user->{$field};
            }
        } else {
            $data = $user;
        }
        //
        return $data;
    }

    /**
     * Verificar se existe provedor na lista.
     *  
     * @param string $provider
     * @return bool
     */
    private function hasProvider(string $provider): bool
    {
        return in_array($provider, $this->providers);
    }
}

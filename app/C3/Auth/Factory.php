<?php

namespace App\C3\Auth;

use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User;

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
        $this->providers = collect($this->config->providers);

        if (!$this->hasProvider($provider)) {
            throw new \Exception("Provedor $provider não foi configurado.");
        }

        $this->provider = Socialite::driver($provider);
    }

    /**
     * @param string $provider
     * @return Factory
     */
    public static function build(string $provider): Factory
    {
        return new self($provider);
    }

    /**
     * Obter informações do usuario autenticado.
     * 
     * @return array
     */
    public function retrieveByToken(string $token): array
    {
        $user = $this->provider->userFromToken($token);

        // 
        return $this->mapTo($user);
    }

    /**
     * obtem campos de acordo com a configuração do provedor.
     * 
     * @param User
     * @return array
     */
    public function mapTo(User $user): array
    {
        $provider = $this->providers->where('instance', get_class($this->provider))->first();
        //
        $fields = $provider['fields'];
        //
        $data = [];

        foreach ($fields as $field => $renamed) {
            $data[$field] = $user->{$renamed ?? $field};
        }

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
        return $this->providers->has($provider);
    }
}

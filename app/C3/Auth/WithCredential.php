<?php

namespace App\C3\Auth;

use App\Domain\Auth\Entities\User;
use Illuminate\Support\Facades\Hash;

final class WithCredential
{
    /**
     * Configurações do dominio Auth.
     * 
     * @var array
     */
    protected $config = [];

    /**
     * Tentativas de autenticação.
     * 
     * @var int
     */
    protected $taps = 0;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->config = collect(config('domain::auth')['credentials']);
        $this->taps = 0;
    }

    /**
     * @return WithCredential
     */
    public static function build(): WithCredential
    {
        return new self();
    }

    /**
     * Gerar token de acesso para usuario.
     * 
     * @param string $username
     * @param string $password
     * @param array $scoped
     */
    public function attemptApi(string $username, string $password, $scopes = [])
    {
        $user = $this->searchUserByUsername($username);

        return retry($this->config->get('taps'), function () use ($user, $password, $scopes) {
            $select = $user->first();
            //
            // Informar erro
            //
            abort_if(!$user->exists(), 404, 'Usuário não localizado.');

            abort_if(!Hash::check($password, $select->password), 400, 'Senha incorreta.');

            $token = $select->createToken(null, $scopes);

            return [
                'token' => $token->accessToken,
                'id' => $select->id,
                'expires_in' => now()->addMonths(2)
            ];
        }, 100);
    }

    /**
     * Realizar consulta de usuario de acordo com os parametros
     * configurados no dominio Auth.
     * 
     * @param string $username
     * @return mixed
     */
    public function searchUserByUsername(string $username)
    {
        $params = $this->config->get('username');

        $query = [];

        $model = User::query();

        //
        // Montar parametros para busca no banco
        //
        foreach ($params as $param) {
            if (count($query) === 0) {
                $model->where($param, '=', $username);
                $query[] = $param;
                continue;
            }
            $model->orWhere($param, '=', $username);
        }

        return $model;
    }
}

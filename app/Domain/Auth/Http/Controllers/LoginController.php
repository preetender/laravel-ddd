<?php

namespace App\Domain\Auth\Http\Controllers;

use App\Units\Http\Controllers\Controller;
use App\Domain\Auth\Http\Validations\LoginRequest;
use App\C3\Auth\WithCredential;

class LoginController extends Controller
{
    /**
     * Autenticação
     * 
     * Autenticar usuario com credenciais de acesso,acesse no insomnia inicio -> login.
     * 
     * @group Inicio
     * @bodyParam username string required Usuario
     * @bodyParam password string required Senha de acesso
     * @responseFile 201 responses/inicio/auth/201.json
     * @responseFile 422 responses/inicio/auth/422.json
     */
    public function __invoke(LoginRequest $request)
    {
        $auth = WithCredential::build();

        return $auth->attemptApi($request->username, $request->password, ['client']);
    }
}

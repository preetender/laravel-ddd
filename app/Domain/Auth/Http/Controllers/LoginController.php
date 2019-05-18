<?php

namespace App\Domain\Auth\Http\Controllers;

use App\Units\Http\Controllers\Controller;
use App\Domain\Auth\Http\Validations\LoginRequest;

class LoginController extends Controller
{
    /**
     * Autenticação
     * 
     * @group Inicio
     * @bodyParam username string required Usuario
     * @bodyParam password string required Senha de acesso
     * 
     * @responseFile 201 responses/inicio/auth.201.json
     */
    public function __invoke(LoginRequest $request)
    {
        return $request->all();
    }
}

<?php

namespace App\Domain\Auth\Http\Controllers;

use App\Units\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Auth\Http\Validations\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Cadastro de usuários
     * 
     * @group Inicio
     * 
     * @bodyParam name string required Nome
     * @bodyParam email string required Email
     * @bodyParam avatar file Avatar
     * @bodyParam password string required Senha de acesso
     * @bodyParam password_confirmation string required Repetir senha
     * 
     * @response 201 {}
     */
    public function __invoke(RegisterRequest $request)
    {
        return $request->all();
    }
}

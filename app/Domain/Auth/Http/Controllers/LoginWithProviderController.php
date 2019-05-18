<?php

namespace App\Domain\Auth\Http\Controllers;

use Illuminate\Http\Request;
use App\Units\Http\Controllers\Controller;

class LoginWithProviderController extends Controller
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
    public function __invoke(Request $request, string $provider)
    {
        dd(func_get_args());
    }
}

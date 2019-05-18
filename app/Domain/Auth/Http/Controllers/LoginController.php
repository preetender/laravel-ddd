<?php

namespace App\Domain\Auth\Http\Controllers;

use App\Units\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function __invoke(Request $request)
    {
        return $request->all();
    }
}

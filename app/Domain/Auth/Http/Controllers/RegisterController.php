<?php

namespace App\Domain\Auth\Http\Controllers;

use App\Units\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Cadastro de usuários
     * 
     * @group Inicio
     * 
     * @bodyParam name string required
     * @bodyParam email string required
     * @bodyParam avatar file
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     * 
     * @response 201 {}
     */
    public function __invoke(Request $request)
    {
        return $request->all();
    }
}

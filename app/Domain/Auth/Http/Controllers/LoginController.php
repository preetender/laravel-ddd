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
     * 
     * @bodyParam username string required
     * @bodyParam password string required digits:6
     * 
     * @responseFile 201 responses/inicio/auth.201.json
     * @responseFile 400 responses/inicio/auth.400.json
     * @responseFile 422 responses/inicio/auth.422.json
     */
    public function __invoke(Request $request)
    {
        return $request->all();
    }
}

<?php

namespace App\Domain\Auth\Http\Controllers;

use Illuminate\Http\Request;
use App\Units\Http\Controllers\Controller;
use App\C3\Auth\WithProvider;
use App\Domain\Auth\Entities\User;
use Illuminate\Support\Facades\DB;
use App\Domain\Auth\Http\Validations\LoginProviderRequest;

class LoginWithProviderController extends Controller
{
    /**
     * Autenticação via provedor
     * 
     * Autenticação via token com provedores, acesse no insomnia inicio -> login via provedor.
     * 
     * @group Inicio
     * @description Teste
     * @bodyParam token string required Token
     * @responseFile 201 responses/inicio/auth-provider/201.json
     * @responseFile 422 responses/inicio/auth-provider/422.json
     */
    public function __invoke(LoginProviderRequest $request, string $provider)
    {
        $factory = WithProvider::build($provider);

        $user = (object)$factory->retrieveByToken($request->input('token'));
        $user->type = 'client';

        DB::beginTransaction();

        //
        // Verificar se usuario esta registrado
        //
        $query = User::firstOrNew(['email' => $user->email], [
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'data' => [
                'id' => $user->id
            ]
        ]);

        try {
            if (!$query->exists) {
                // registrar
                $query->save();
            }

            // 
            // Gerar token de acesso
            //
            $token = $query->createToken(null, ['client']);

            DB::commit();

            //
            return response()->json([
                'token' => $token->accessToken,
                'expires_in' => now()->addMonths(3),
                'id' => $query->id
            ], 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            //
            abort(400, $exception->getMessage());
        }
    }
}

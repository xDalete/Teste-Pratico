<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AlunoController extends Controller
{
    /**
     * Exibe os dados do aluno autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = auth()->user();
        return response()->json([
            'status' => 'success',
            'data' => [
                'nome' => $user->name,
                'email' => $user->email,
                'cpf' => $user->aluno->first()->cpf,
            ],
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Realiza a autenticação do usuário e gera um token de acesso.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $request->user()->createToken('auth_token')->plainTextToken;
            return response()->json([
                'status' => 'success',
                'message' => 'Login realizado com sucesso!',
                'token' => $token,
                'user' => $user,
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Credenciais inválidas!'
            ], 401);
        }
    }
    /**
     * Realiza o logout do usuário, revogando o token de acesso.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $user = Auth::user();
        if ($user) {
            $user->tokens()->delete(); // Revoga todos os tokens do usuário
            return response()->json([
                'status' => 'success',
                'message' => 'Logout realizado com sucesso!'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não autenticado!'
            ], 401);
        }
    }
}

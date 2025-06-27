<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Buscar usuários ordenados por id em ordem decrescente e paginar os resultados
        $users = User::orderBy('id', 'desc')->paginate(10);

        // Retornar a resposta JSON com o status e os usuários
        return response()->json([
            'status' => 'success',
            'users' => $users,
        ], 200);
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        // Verifica se o usuário existe
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não encontrado!',
            ], 404);
        }
        // Retornar a resposta JSON com o status e o usuário específico
        return response()->json([
            'status' => 'success',
            'user' => $user,
        ], 200);
    }

    /**
     * Cria um novo usuário com os dados fornecidos.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            // Criação do usuário
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            DB::commit();

            // Retornar a resposta JSON com o status e o usuário criado
            return response()->json([
                'status' => 'success',
                'message' => 'Usuário cadastrado com sucesso!',
                'user' => $user,
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não cadastrado!',
            ], 500);
        }
    }
    /**
     * Atualiza os dados de um usuário específico.
     *
     * @param UserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        DB::beginTransaction();
        try {
            // Atualização dos dados do usuário
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            DB::commit();

            // Retornar a resposta JSON com o status e o usuário atualizado
            return response()->json([
                'status' => 'success',
                'message' => 'Usuário atualizado com sucesso!',
                'user' => $user,
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não atualizado!',
            ], 500);
        }
    }

    /**
     * Exclui um usuário específico.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            // Excluir o usuário
            $user->delete();

            // Retornar a resposta JSON com o status de sucesso
            return response()->json([
                'status' => 'success',
                'message' => 'Usuário excluído com sucesso!',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não apagado!',
            ], 500);
        }
    }
}

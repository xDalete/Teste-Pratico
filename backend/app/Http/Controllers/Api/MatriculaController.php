<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class MatriculaController extends Controller
{
    /**
     * Exibe as matrículas do aluno autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $matriculas = auth()->user()->aluno->first()->matricula()->with('disciplina')->get();

        return response()->json([
            'status' => 'success',
            'data' => $matriculas->map(function ($matricula) {
                return [
                    'id' => $matricula->id,
                    'disciplina' => [
                        'id' => $matricula->disciplina->id,
                        'nome' => $matricula->disciplina->nome,
                        'semestre' => $matricula->disciplina->semestre,
                    ],
                    'semestre' => $matricula->semestre,
                ];
            }),
        ], 200);
    }
}

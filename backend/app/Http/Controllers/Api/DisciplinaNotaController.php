<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Http\JsonResponse;

class DisciplinaNotaController extends Controller
{
    /**
     * Return the disciplina info and all notas.
     */
    public function notas(Disciplina $disciplina): JsonResponse
    {
        $aluno = auth()->user()->aluno;

        $notas = $disciplina->notas()->where('aluno_id', $aluno->id)->first();

        return response()->json([
            'status' => 'success',
            'data' => [
                'disciplina' => [
                    'id' => $disciplina->id,
                    'nome' => $disciplina->nome,
                    'semestre' => $disciplina->semestre,
                ],
                'notas' => [$notas->nota1, $notas->nota2, $notas->nota3],
                'media' => ($notas->nota1 + $notas->nota2 + $notas->nota3) / 3,
            ]
        ], 200);
    }
}


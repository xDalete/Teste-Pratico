<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the Matricula model exists and create a record if it doesn't
        Matricula::create([
            'aluno_id' => 1,
            'disciplina_id' => 1,
            'semestre' => '2025.1',
        ]);
        Matricula::create([
            'aluno_id' => 1,
            'disciplina_id' => 2,
            'semestre' => '2025.1',
        ]);
        Matricula::create([
            'aluno_id' => 1,
            'disciplina_id' => 3,
            'semestre' => '2025.1',
        ]);
        Matricula::create([
            'aluno_id' => 1,
            'disciplina_id' => 4,
            'semestre' => '2025.1',
        ]);
        Matricula::create([
            'aluno_id' => 2,
            'disciplina_id' => 2,
            'semestre' => '2025.1',
        ]);

        Matricula::create([
            'aluno_id' => 2,
            'disciplina_id' => 5,
            'semestre' => '2025.1',
        ]);

        Matricula::create([
            'aluno_id' => 3,
            'disciplina_id' => 3,
            'semestre' => '2025.1',
        ]);

        Matricula::create([
            'aluno_id' => 3,
            'disciplina_id' => 6,
            'semestre' => '2025.1',
        ]);

    }
}

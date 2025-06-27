<?php

namespace Database\Seeders;

use App\Models\Notas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the Notas model exists and create records if it doesn't
        Notas::create([
            'aluno_id' => 1,
            'disciplina_id' => 1,
            'nota1' => 8.5,
            'nota2' => 9.0,
            'nota3' => 7.5,
        ]);
        Notas::create([
            'aluno_id' => 1,
            'disciplina_id' => 2,
            'nota1' => 8.0,
            'nota2' => 8.5,
            'nota3' => 9.0,
        ]);
        Notas::create([
            'aluno_id' => 1,
            'disciplina_id' => 3,
            'nota1' => 7.0,
            'nota2' => 8.0,
            'nota3' => 8.5,
        ]);
        Notas::create([
            'aluno_id' => 1,
            'disciplina_id' => 4,
            'nota1' => 9.0,
            'nota2' => 8.5,
            'nota3' => 9.5,
        ]);
        Notas::create([
            'aluno_id' => 2,
            'disciplina_id' => 2,
            'nota1' => 7.5,
            'nota2'=> 0,
            'nota3' => 8.0,
        ]);
        Notas::create([
            'aluno_id' => 2,
            'disciplina_id' => 5,
            'nota1' => 9.0,
            'nota2' => 8.5,
            'nota3' => 9.0,
        ]);
        Notas::create([
            'aluno_id' => 3,
            'disciplina_id' => 3,
            'nota1' => 9.0,
            'nota2' => 8.5,
            'nota3' => 9.0,
        ]);
        Notas::create([
            'aluno_id' => 3,
            'disciplina_id' => 6,
            'nota1' => 9.0,
            'nota2' => 8.5,
            'nota3' => 9.0,
        ]);
    }
}

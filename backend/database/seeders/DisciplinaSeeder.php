<?php

namespace Database\Seeders;

use App\Models\Disciplina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Disciplina::where('nome', 'Matemática')->exists()) {
            Disciplina::create([
                'nome' => 'Matemática',
                'semestre' => '2025.1',
            ]);
        }
        if (!Disciplina::where('nome', 'Física')->exists()) {
            Disciplina::create([
                'nome' => 'Física',
                'semestre' => '2025.1',
            ]);
        }
        if (!Disciplina::where('nome', 'Química')->exists()) {
            Disciplina::create([
                'nome' => 'Química',
                'semestre' => '2025.1',
            ]);
        }
        if (!Disciplina::where('nome', 'Biologia')->exists()) {
            Disciplina::create([
                'nome' => 'Biologia',
                'semestre' => '2025.1',
            ]);
        }
        if (!Disciplina::where('nome', 'História')->exists()) {
            Disciplina::create([
                'nome' => 'História',
                'semestre' => '2025.1',
            ]);
        }
        if (!Disciplina::where('nome', 'Geografia')->exists()) {
            Disciplina::create([
                'nome' => 'Geografia',
                'semestre' => '2025.1',
            ]);
        }
    }
}

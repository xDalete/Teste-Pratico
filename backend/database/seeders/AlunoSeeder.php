<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Aluno::where('cpf', '12345678901')->exists()) {
            Aluno::create([
                'user_id' => 1,
                'cpf' => '12345678901',
            ]);
        }
        if (!Aluno::where('cpf', '12345678902')->exists()) {
            Aluno::create([
                'user_id' => 2,
                'cpf' => '12345678902',
            ]);
        }
        if (!Aluno::where('cpf', '12345678903')->exists()) {
            Aluno::create([
                'user_id' => 3,
                'cpf' => '12345678903',
            ]);
        }
    }
}

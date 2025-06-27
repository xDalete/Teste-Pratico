<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    /** @use HasFactory<\Database\Factories\NotasFactory> */
    use HasFactory;
    protected $fillable = [
        'aluno_id',
        'disciplina_id',
        'nota1',
        'nota2',
        'nota3',
    ];
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}

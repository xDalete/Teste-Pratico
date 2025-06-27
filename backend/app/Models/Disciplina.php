<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    /** @use HasFactory<\Database\Factories\DisciplinaFactory> */
    use HasFactory;

    protected $fillable = [
        "nome",
        "semestre",
    ];
    public function matricula()
    {
        return $this->hasMany(Matricula::class);
    }
    public function notas()
    {
        return $this->hasMany(Notas::class);
    }
}

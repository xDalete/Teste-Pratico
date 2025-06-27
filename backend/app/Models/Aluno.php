<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    /** @use HasFactory<\Database\Factories\AlunoFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'cpf'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matricula()
    {
        return $this->hasMany(Matricula::class);
    }

    public function notas()
    {
        return $this->hasMany(Notas::class);
    }
}

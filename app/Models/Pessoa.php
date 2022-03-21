<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{


    // Campos que podem ser 'blindados'

    protected $fillable = [
        'name',
        'sobrenome',
        'celular',
        'email',
    ];
    // Tabela do banco de dados
    protected $table = 'pessoas';
}

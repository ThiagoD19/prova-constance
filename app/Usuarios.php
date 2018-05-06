<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nome', 'email','telefone','dataNascimento', 'salario', 'cargo', 'foto'
    ];
}

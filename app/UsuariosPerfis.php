<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosPerfis extends Model
{

    protected $fillable = [
        'usuario_id', 'role_id'
    ];


    public function roles()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function usuarios()
    {
        return $this->hasOne('App\usuarios', 'id', 'usuario_id');
    }
}

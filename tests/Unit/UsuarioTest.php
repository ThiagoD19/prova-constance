<?php

namespace Tests\Unit;

use App\Role;
use App\Usuarios;
use App\UsuariosPerfis;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function testeCreateUsuarioPerfil()
    {
        $usuario = new Usuarios();
        $usuario = $usuario->create([
            'nome'              => 'Admin Joe',
            'email'             => 'admin@admin.com',
            'telefone'          => '(00) 0000-0000',
            'dataNascimento'    => '1990-01-01',
            'salario'           => '1000.0',
            'cargo'             => 'Teste',
            'foto'              =>  'usuarios/avatar_01.png'
        ]);

        $role = new Role();
        $role = $role->create([
            'nome'              => 'Admin',
            'descricao'          => 'Perfil de administrador'
        ]);

        $usuarioPerfil = UsuariosPerfis::create([
            'usuario_id'        => $usuario->id,
            'role_id'           => $role->id
        ]);

        $usuario = $usuario->find(1);
        $role = $role->find(1);

        $this->assertEquals($usuarioPerfil->usuarios, $usuario);
        $this->assertEquals($usuarioPerfil->roles, $role);
    }
}

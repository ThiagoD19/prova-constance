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

    public function testCreateUsualPeril()
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

        $usuarioPerfil = UsuariosPerfis::create(array(
            'usuario_id'        => $usuario->id,
            'role_id'           => $role->id
        ));

        $usuario = $usuario->find(1);
        $role = $role->find(1);

        $this->assertEquals($usuarioPerfil->usuarios, $usuario);
        $this->assertEquals($usuarioPerfil->roles, $role);
    }

    public function testDeleteUsually()
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

        $this->assertDatabaseHas('usuarios', ['nome'=> 'Admin Joe', 'email'=>'admin@admin.com']);

        $usuario->delete();

        $this->assertDatabaseMissing('usuarios', ['nome'=> 'Admin Joe', 'email'=>'admin@admin.com']);
    }

    public function testEditorUsually()
    {
        $usuario = new Usuarios();
        $usuario = $usuario->create([
            'nome'              => 'Admin',
            'email'             => 'admin@admin.com',
            'telefone'          => '(00) 0000-0000',
            'dataNascimento'    => '1990-01-01',
            'salario'           => '1000.0',
            'cargo'             => 'Teste',
            'foto'              =>  'usuarios/avatar_01.png'
        ]);
        $this->assertDatabaseHas('usuarios', ['nome'=> 'Admin', 'email'=>'admin@admin.com']);

        $usuario->nome  = 'John Doe';
        $usuario->email = 'user@admin.com';
        $usuario->save();

        $this->assertDatabaseHas('usuarios', ['nome'=> 'John Doe', 'email'=>'user@admin.com']);
        $this->assertDatabaseMissing('usuarios', ['nome'=> 'Admin', 'email'=>'admin@admin.com']);
    }
}

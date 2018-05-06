<?php

namespace App\Http\Controllers;

use App\Role;
use App\Usuarios;
use App\UsuariosPerfis;

class UsuariosPerfisController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $usuario = new Usuarios();
        $usuarios = $usuario->get()->sortByDesc('nome');

        $role = new Role();
        $roles = $role->get()->sortByDesc('created_at');

        $usuarioRole = new UsuariosPerfis();
        $usuarioRoles = $usuarioRole->orderBy('created_at', 'desc')->paginate(6);
        $itens = array(
            'total' => $usuarioRole->count(),
            'page' => request('page') ? request('page') : 1,
            'perpage' => 6
        );

        return view('usuario-perfil.index', compact('usuarios', 'roles', 'itens', 'usuarioRoles'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $usuarioRole = new UsuariosPerfis();
            $resultado = $usuarioRole->find($id)->delete();

            if ($resultado) {
                return redirect()->route('usuarios-perfis.index')
                    ->with('success', 'Associação removida com sucesso!');
            } else {
                throw new \Exception();
            }

        } catch (\Exception $e) {
            return redirect()->route('usuarios-perfis.index')
                ->with('error', 'Associação não pode ser removida.Por favor tente novamente!');
        }
    }


    public function store()
    {
        try {
            $usuarioPerfil = new UsuariosPerfis();
            $existe = $usuarioPerfil->whereUsuarioId(request('usuario_id'))->get();

            if (!isset($existe[0])) {
                $resultado = UsuariosPerfis::create([
                    'usuario_id' => request('usuario_id'),
                    'role_id' => request('role_id'),
                ]);

                if ($resultado) {
                    return redirect()->route('usuarios-perfis.index')
                        ->with('success', 'Associação inserida com sucesso!');
                } else {
                    throw new \Exception();
                }

            } else {
                return redirect()->route('usuarios-perfis.index')
                    ->with('error', 'O usuário já possui um perfil associado. Por favor tente novamente.');
            }

        } catch (\Exception $e) {
            return redirect()->route('usuarios-perfis.index')
                ->with('error', 'Erro ao inserir uma nova associação. Por favor tente novamente.');
        }
    }
}

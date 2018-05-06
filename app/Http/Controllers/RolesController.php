<?php

namespace App\Http\Controllers;

use App\Role;

class RolesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $role = new Role();
        $roles = $role->orderBy('created_at', 'desc')->paginate(6);
        $itens = array(
            'total' => $role->count(),
            'page' => request('page') ? request('page') : 1,
            'perpage' => 6
        );

        return view('roles.index', compact('roles', 'itens'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('roles.novo');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $usuario = new Role();
            $resultado = $usuario->find($id)->delete();

            if ($resultado) {
                return redirect()->route('perfis.index')
                    ->with('success', 'Perfil removido com sucesso!');
            } else {
                throw new \Exception();
            }

        } catch (\Exception $e) {
            return redirect()->route('perfis.index')
                ->with('error', 'Perfil não pode ser removido.Por favor tente novamente!');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        try {
            $resultado = Role::create([
                'nome' => request('nome'),
                'descricao' => request('descricao')
            ]);

            if ($resultado) {
                return redirect()->route('perfis.index')
                    ->with('success', 'Perfil ' . request('nome') . ' inserido com sucesso!');
            } else {
                throw new \Exception();
            }

        } catch (\Exception $e) {
            return redirect()->route('perfis.index')
                ->with('error', 'Erro ao inserir novo perfil. Por favor tente novamente.');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = new Role();
        $role = $role->find($id);

        return view('roles.editar', compact('role'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        try {
            $role = new Role();
            $role = $role->find($id);

            $role->nome = request('nome');
            $role->descricao = request('descricao');
            $resultado = $role->save();

            if ($resultado) {

                return redirect()->route('perfis.index')
                    ->with('success', 'Perfil ' . request('nome') . ' editado com sucesso.');
            } else {

                throw new \Exception();
            }

        } catch (\Exception $e) {

            return redirect()->route('perfis.index')
                ->with('error', 'Erro ao editar o perfil. Por favor tente novamente.');
        }
    }
}

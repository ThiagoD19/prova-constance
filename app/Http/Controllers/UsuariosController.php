<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuario;
use App\Usuarios;

class UsuariosController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $usuario = new Usuarios();
        $usuarios = $usuario->orderBy('created_at', 'desc')->paginate(6);
        $itens = array(
            'total' => $usuario->count(),
            'page' => request('page') ? request('page') : 1,
            'perpage' => 6
        );

        return view('usuarios.index', compact('usuarios', 'itens'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('usuarios.novo');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $usuario = new Usuarios();
            $resultado = $usuario->find($id)->delete();

            if ($resultado) {
                return redirect()->route('usuarios.index')
                    ->with('success', 'Usuário removido com sucesso!');
            } else {
                throw new \Exception();
            }

        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Usuário não pode ser removido.Por favor tente novamente!');
        }
    }

    /**
     * @param StoreUsuario $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUsuario $request)
    {
        try {
            $foto = 'usuarios/avatar_01.png';

            if (isset($request->foto)) {
                $foto = $request->foto
                    ->storeAs('usuarios', str_random(10) . '-' . $request->foto->getClientOriginalName());
            }

            $resultado = Usuarios::create([
                'foto' => $foto,
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'dataNascimento' => date_format(new \DateTime($request->dataNascimento), 'y-m-d'),
                'salario' => str_replace(',', '.', str_replace('.', '', $request->salario)),
                'cargo' => $request->cargo,
            ]);

            if ($resultado) {
                return redirect()->route('usuarios.index')
                    ->with('success', 'Usuário ' . \request('nome') . ' inserido com sucesso!');
            } else {
                throw new \Exception();
            }

        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Erro ao inserir novo usuário. Por favor tente novamente.');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $usuario = new Usuarios();
        $usuario = $usuario->find($id);

        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * @param $id
     * @param StoreUsuario $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, StoreUsuario $request)
    {
        try {
            $usuario = new Usuarios();
            $usuario = $usuario->find($id);

            if (isset($request->foto)) {
                $usuario->foto = $request->foto
                    ->storeAs('usuarios', str_random(10) . '-' . $request->foto->getClientOriginalName());
            }

            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->dataNascimento = date_format(new \DateTime($request->dataNascimento), 'y-m-d');
            $usuario->salario = str_replace(',', '.', str_replace('.', '', $request->salario));
            $usuario->cargo = $request->cargo;
            $resultado = $usuario->save();

            if ($resultado) {
                return redirect()->route('usuarios.index')
                    ->with('success', 'Usuário ' . \request('nome') . ' editado com sucesso.');
            } else {
                throw new \Exception();
            }

        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Erro ao editar o usuário. Por favor tente novamente.');
        }
    }
}

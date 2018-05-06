@section('table')
    <style>
        th, td{
            text-align:center;
            vertical-align:middle;
        }
    </style>
    <div class="box box-default"  style="border-top-color: black;">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class=" col-md-12">
                    <div class=" table-responsive">
                        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1" >Foto</th>
                                    <th rowspan="1" colspan="1" >Nome</th>
                                    <th rowspan="1" colspan="1" >Email</th>
                                    <th rowspan="1" colspan="1" >Telefone</th>
                                    <th rowspan="1" colspan="1" >Data de Nascimento</th>
                                    <th rowspan="1" colspan="1" >Cargo</th>
                                    <th rowspan="1" colspan="1" >Salário</th>
                                    <th rowspan="1" colspan="1" >Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($usuarios))
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>
                                                <img class="img-circle" src="{{asset('storage/'. (isset($usuario->foto)?$usuario->foto:'usuarios/avatar_01.png'))}}" style="width:50px">
                                            </td>
                                            <td>{{$usuario->nome}} </td>
                                            <td>{{isset($usuario->cargo)?$usuario->email:null}}</td>
                                            <td>{{isset($usuario->cargo)?$usuario->telefone:null}}</td>
                                            <td>{{isset($usuario->dataNascimento)?date_format(new \DateTime($usuario->dataNascimento),'d/m/Y'):null}}</td>
                                            <td>{{isset($usuario->cargo)?$usuario->cargo:null}}</td>
                                            <td>{{isset($usuario->salario)?'R$ ' . (number_format($usuario->salario,2,',','.')):null}}</td>
                                            <td>
                                                <form action="{{route('usuarios.edit',$usuario->id)}}" method="get">
                                                    <button type="submit"  class="btn btn-sm bg-light-blue-active" title="Editar">
                                                        <i class="fa fa-edit" aria-hidden="true"></i></button>
                                                </form>
                                                <form action="{{route('usuarios.destroy',$usuario->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn bg-red-active btn-sm" title="Remover" style="margin:1rem"
                                                        onclick="return confirm('Deseja excluir o usuário {{$usuario->nome}} ?')">
                                                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite" style="margin-top: 1rem">
                            <p>Mostrando de {{1 + $itens['page'] * $itens['perpage'] - ($itens['perpage'] )}} até
                                {{$itens['page'] * $itens['perpage']> $itens['total'] ? $itens['total'] : $itens['page'] * $itens['perpage']}}
                                de {{$itens['total']}} registos.
                            </p>
                        </div>

                        <div style="margin-top: 2rem">
                            {{$usuarios->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
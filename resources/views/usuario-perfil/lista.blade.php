
@section('table')
    <style>
        th, td{
            text-align:center;
            vertical-align:middle;
        }
    </style>
    <div class="box box-default" style="border-top-color: black;">
    <div class="box-body">
        <div class="row">
            <div class=" col-md-12">
                <div class=" table-responsive">
                    <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="dataTable_info">
                        <thead>
                        <tr>
                            <th rowspan="1" colspan="1" >Usuário</th>
                            <th rowspan="1" colspan="1" >Perfil</th>
                            <th rowspan="1" colspan="1" >Data</th>
                            <th rowspan="1" colspan="1" >Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($usuarioRoles))
                            @foreach($usuarioRoles as $usuarioRole)
                                <tr>
                                    <td>{{isset($usuarioRole->usuarios->nome)?$usuarioRole->usuarios->nome:null}}</td>
                                    <td>{{isset($usuarioRole->roles->nome)?$usuarioRole->roles->nome:null}}</td>
                                    <td>{{isset($usuarioRole->updated_at)?date_format($usuarioRole->updated_at,'d/m/Y'):null}}</td>
                                    <td>
                                        <form action="{{route('usuarios-perfis.destroy',$usuarioRole->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn bg-red-active btn-sm" title="Remover" style="margin:1rem"
                                                    onclick="return confirm('Deseja excluir a associação ' +
                                                            ' {{$usuarioRole->usuarios->nome}} - {{$usuarioRole->roles->nome}} ?')">
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
                        <p>Mostrando de {{1 + $itens['page']  * $itens['perpage'] - ($itens['perpage'] )}} até
                        {{$itens['page'] * $itens['perpage']> $itens['total'] ? $itens['total'] : $itens['page'] * $itens['perpage']}}
                        de {{$itens['total']}} registos.
                        </p>
                    </div>

                    <div style="margin-top: 2rem">
                    {{$usuarioRoles->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
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
                                    <th rowspan="1" colspan="1" >Nome</th>
                                    <th rowspan="1" colspan="1" >Descrição</th>
                                    <th rowspan="1" colspan="1" >Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($roles))
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{isset($role->nome)?$role->nome:null}}</td>
                                            <td>{{isset($role->descricao)?$role->descricao:null}}</td>
                                            <td>
                                                <form action="{{route('perfis.edit',$role->id)}}" method="get">
                                                    <button type="submit"  class="btn btn-sm bg-light-blue-active" title="Editar">
                                                        <i class="fa fa-edit" aria-hidden="true"></i></button>
                                                </form>
                                                <form action="{{route('perfis.destroy',$role->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn bg-red-active btn-sm" title="Remover" style="margin:1rem"
                                                        onclick="return confirm('Deseja excluir o perfil {{$role->nome}} ?')">
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
                            {{$roles->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
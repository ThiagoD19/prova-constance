@extends('adminlte::page')

@section('content_header')
    <section>
        <ol class="breadcrumb">
            <li style="padding-top: 6px;"><a href="#"><i class="fa fa-key"></i>&nbsp; Usuário/Perfil</a></li>

        </ol>

        @if(session('success'))
            <div class="callout callout-success">
                <p>{{session('success')}}</p>
            </div>
        @elseif(session('error'))
            <div class="callout callout-danger">
                <p>{{session('error')}}</p>
            </div>
        @endif
    </section>
@stop

@section('content')
    <div class="box box-default" style="border-top-color: black;">
        <div class="box-body">
            <div class="row">
                <form action="{{route('usuarios-perfis.store')}}" method="post">
                    @csrf
                    <div class=" col-md-12">
                        <div class=" col-md-5">
                            <select name="usuario_id" title="Usuario" class="form-control" id="usuario_id">
                                <option></option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}"> {{$usuario->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" col-md-5">
                            <select name="role_id" title="Roles" class="form-control input-sm " id="role_id">
                                <option></option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}"> {{$role->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2" style="margin-top: 5px">
                            <button type="submit"   class="btn bg-blue-active btn-xs btn-block">
                                <i class="glyphicon glyphicon-resize-small"></i> Associar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('usuario-perfil.lista')                      @yield('table')

@stop

@section('js')
    <script>
        $(document).ready(function() {

            $('#usuario_id').select2({
                placeholder: 'Selecione um usuário...',
            });

            $('#role_id').select2({
                placeholder: 'Selecione um perfil...',
            });
        });
    </script>
@stop
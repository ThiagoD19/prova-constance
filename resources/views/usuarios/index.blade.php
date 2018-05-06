@extends('adminlte::page')

@section('content_header')
    <section>
        <ol class="breadcrumb">
            <li style="padding-top: 6px;"><a href="#"><i class="fa fa-users"></i>&nbsp; Usuários</a></li>
            <li style="padding-top: 6px;"><a href="#">&nbsp; Lista de Usuários</a></li>
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
                <div class=" col-md-12">
                    <div class=" col-md-10">
                        <h4 class="box-title"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Lista de Usuários</h4>
                    </div>

                    <div class=" col-md-2" style="margin-top: 1rem;">
                        <a name='Novo Usuário' type="button" class="btn-xs btn btn-block bg-navy" href="{{route('usuarios.create')}}">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Novo Usuário</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('usuarios.lista')                      @yield('table')

@stop
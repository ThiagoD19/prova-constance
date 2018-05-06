@extends('adminlte::page')

@section('content_header')
    <section>
        <ol class="breadcrumb">
            <li style="padding-top: 6px;"><a href="{{route('usuarios.index')}}"><i class="fa fa-users"></i>&nbsp; Usuários</a></li>
            <li style="padding-top: 6px;"><a href="#">&nbsp; Editar Usuário</a></li>
        </ol>

    </section>
@stop

@section('content')
    <div class="box box-default" style="border-top-color: black;">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Editar Usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <form action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @include('usuarios.formulario')                      @yield('form')
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    @include('usuarios.script')                         @yield('js')
@stop
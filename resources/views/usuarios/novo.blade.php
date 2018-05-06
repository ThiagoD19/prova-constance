@extends('adminlte::page')

@section('content_header')
    <section>
        <ol class="breadcrumb">
            <li style="padding-top: 6px;"><a href="{{route('usuarios.index')}}"><i class="fa fa-users"></i>&nbsp; Usuários</a></li>
            <li style="padding-top: 6px;"><a href="#">&nbsp; Novo Usuário</a></li>
        </ol>

    </section>
@stop

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Novo Usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <form action="{{route('usuarios.store')}}" method="post" enctype="multipart/form-data">
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
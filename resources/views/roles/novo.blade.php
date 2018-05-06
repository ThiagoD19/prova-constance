@extends('adminlte::page')

@section('content_header')
    <section>
        <ol class="breadcrumb">
            <li style="padding-top: 6px;"><a href="{{route('perfis.index')}}"><i class="fa fa-lock"></i>&nbsp; Perfis</a></li>
            <li style="padding-top: 6px;"><a href="#">&nbsp; Novo Perfil</a></li>
        </ol>

    </section>
@stop

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Novo Perfil</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <form action="{{route('perfis.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('roles.formulario')                      @yield('form')
                </form>
            </div>
        </div>
    </div>

@stop
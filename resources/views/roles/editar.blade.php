@extends('adminlte::page')

@section('content_header')
    <section>
        <ol class="breadcrumb">
            <li style="padding-top: 6px;"><a href="{{route('perfis.index')}}"><i class="fa fa-lock"></i>&nbsp; Perfis</a></li>
            <li style="padding-top: 6px;"><a href="#">&nbsp; Editar Perfil</a></li>
        </ol>

    </section>
@stop

@section('content')
    <div class="box box-default" style="border-top-color: black;">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Editar Perfil</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <form action="{{route('perfis.update',$role->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @include('roles.formulario')                      @yield('form')
                </form>
            </div>
        </div>
    </div>
@stop

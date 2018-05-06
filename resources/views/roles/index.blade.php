@extends('adminlte::page')

@section('content_header')
    <section>
        <ol class="breadcrumb">
            <li style="padding-top: 6px;"><a href="#"><i class="fa fa-lock"></i>&nbsp; Perfis</a></li>
            <li style="padding-top: 6px;"><a href="#">&nbsp; Lista de Perfis</a></li>
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
                        <h4 class="box-title"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Lista de Perfis</h4>
                    </div>

                    <div class=" col-md-2" style="margin-top: 1rem;">
                        <a type="button" class="btn-xs btn btn-block bg-navy" href="{{route('perfis.create')}}">
                            <i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Novo Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('roles.lista')                      @yield('table')

@stop
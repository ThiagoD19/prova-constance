@section('form')
    <aside style="margin: 0 3rem 3rem;">
        <div id="upload-foto" >
            <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/'. (isset($usuario->foto)?$usuario->foto:'usuarios/avatar_01.png'))}}" alt="User profile picture" style="margin-bottom: 5px">
        </div>
        <div style="margin-top: 2rem">
            <input id="foto" name="foto" type="file" class="input-wrapper" value=""/>
        </div>
    </aside>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <aside class="form-group col-md-12">
        <div class="col-md-6"  style="margin-top: 1rem">
            <input class="form-control input-sm" type="text" name="nome" placeholder="Nome" value="{{isset($usuario->nome)?$usuario->nome:null}}"/>
        </div>

        <div class="col-md-6" style="margin-top: 1rem">
            <input class="form-control input-sm" type="email" name="email" placeholder="Email" value="{{isset($usuario->email)?$usuario->email:null}}"/>
        </div>
    </aside>

    <aside class="form-group col-md-12">
        <div class="col-md-6" style="margin-top: 1rem">
            <label> Data de Nascimento:</label>
            <input class="form-control input-sm" type="text" name="dataNascimento" value="{{isset($usuario->dataNascimento)?date_format(new \DateTime(@$usuario->dataNascimento),'d/m/Y'):null}}" title="Data de Nascimento"/>
        </div>

        <div class="col-md-6"  style="margin-top: 1rem">
            <label> Telefone:</label>
            <input class="form-control input-sm" type="text" name="telefone" placeholder="Telefone" value="{{isset($usuario->telefone)?$usuario->telefone:null}}">
        </div>
    </aside>

    <aside class="form-group col-md-12">
        <div class="col-md-6" style="margin-top: 1rem">
            <label> Salário:</label>
            <input class="form-control input-sm" type="text" name="salario" placeholder="Salário" value="{{isset($usuario->salario)?$usuario->salario:null}}"/>
        </div>

        <div class="col-md-6" style="margin-top: 1rem">
            <label> Cargo:</label>
            <input class="form-control input-sm" type="text" name="cargo" placeholder="Cargo" value="{{isset($usuario->cargo)?$usuario->cargo:null}}">
        </div>
    </aside>

    <aside class="form-group col-md-8">
        <div class="col-md-2"  style="margin-top: 2rem">
            <a href="{{route('usuarios.index')}}" type="button" class="btn btn-xs btn-block bg-blue-active" style="text-align: center;">
                <i class="fa fa-angle-double-left"></i> &nbsp;Voltar</a>
        </div>
        <div class="col-md-2" style="margin-top: 2rem">
            <button type="submit" class="btn btn-xs btn-block bg-green-active" style="text-align: center;">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>  &nbsp; Salvar</button>
        </div>
    </aside>
@stop
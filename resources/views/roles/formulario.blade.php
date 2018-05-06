@section('form')
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
            <input class="form-control input-sm" type="text" name="nome" placeholder="Nome" value="{{isset($role->nome)?$role->nome:null}}"/>
        </div>

        <div class="col-md-6" style="margin-top: 1rem">
            <textarea class="form-control input-sm" type="text" name="descricao" placeholder="Descrição..." maxlength="100"
                >{{isset($role->descricao)?$role->descricao:''}}</textarea>
        </div>
    </aside>

    <aside class="form-group col-md-8">
        <div class="col-md-2"  style="margin-top: 2rem">
            <a href="{{route('perfis.index')}}" type="button" class="btn btn-xs btn-block bg-blue-active" style="text-align: center;">
                <i class="fa fa-angle-double-left"></i> &nbsp;Voltar</a>
        </div>
        <div class="col-md-2" style="margin-top: 2rem">
            <button type="submit" class="btn btn-xs btn-block bg-green-active" style="text-align: center;">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>  &nbsp; Salvar</button>
        </div>
    </aside>
@stop
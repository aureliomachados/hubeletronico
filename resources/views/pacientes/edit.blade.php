@extends('app')

@section('title')
    Editando paciente
@endsection

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Editando paciente</h4>
        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Opa!</strong> Existe algum problema com os valores informados.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{route('pacientes.update', ['id' => $paciente->id])}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT"/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nome</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="paciente" value="{{$paciente->nome}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Prontuário</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="prontuario" value="{{$paciente->prontuario}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Data de nascimento</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="data_nascimento" value="{{date('d/m/Y', strtotime($paciente->data_nascimento))}}">
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">RG</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="rg" value="{{$paciente->rg}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Orgão</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="orgao" value="{{$paciente->orgao}}">
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label class="col-md-4 control-label">UF</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="uf" value="{{$paciente->uf}}">
                        </div>
                    </div>
                    -->

                    <div class="form-group">
                        {!! Form::label('estado_id', 'UF', ['class' => ' col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('estado_id', $estados, $paciente->estado_id, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-ok"></i> Salvar
                            </button>
                            <a href="{{route('pacientes.index')}}" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i> Voltar </a>
                        </div>
                    </div>
                </form>

                    {!! Form::model($paciente, ['route' => ['pacientes.destroy', $paciente->id], 'id' => 'form-delete', 'method' => 'DELETE']) !!}

                        <button type="button" class="btn btn-danger confirm-delete">
                            <i class="glyphicon glyphicon-remove"></i> Excluir
                        </button>

                    {!! Form::close() !!}

                <div class="page-header">

                </div>
            </div>
        </div>
    </div>


@endsection
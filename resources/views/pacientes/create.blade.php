@extends('app')

@section('title')
    Adicionar novo paciente
@endsection

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Adicionar paciente</h4>
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

                <form class="form-horizontal" role="form" method="POST" action="{{route('pacientes.store')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nome</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Prontuário</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="prontuario" value="{{ old('prontuario') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Data de nascimento</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="data_nascimento" value="{{old('data_nascimento')}}">
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">RG</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="rg" value="{{old('rg')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Orgão</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="orgao" value="{{old('orgao')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('estado_id', 'UF', ['class' => ' col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <div class="col-md-6">
                                {!! Form::select('estado_id', $estados, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-ok"></i> Adicionar
                            </button>
                            <button type="reset" class="btn btn-warning">
                                <i class="glyphicon glyphicon-refresh"></i> Limpar
                            </button>
                            <a href="{{route('pacientes.index')}}" class="btn btn-danger"><i class="glyphicon glyphicon-backward"></i> Voltar </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
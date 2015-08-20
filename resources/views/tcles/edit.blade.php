@extends('app')

@section('title')
    Editando registro
@endsection

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Editando registro</h4>
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

                <form class="form-horizontal" role="form" method="POST" action="{{route('tcles.update', ['id' => $tcle->id])}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT"/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Paciente</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="paciente" value="{{$tcle->paciente}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Prontuário</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="prontuario" value="{{$tcle->prontuario}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Data de nascimento</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="data_nascimento" value="{{date('d/m/Y', strtotime($tcle->data_nascimento))}}">
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">RG</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="rg" value="{{$tcle->rg}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Orgão</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="orgao" value="{{$tcle->orgao}}">
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label class="col-md-4 control-label">UF</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="uf" value="{{$tcle->uf}}">
                        </div>
                    </div>
                    -->

                    <div class="form-group">
                        {!! Form::label('estado_id', 'UF', ['class' => ' col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('estados_id', $estados, $tcle->estados_id, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Diagnóstico</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="diagnostico">{{$tcle->diagnostico}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Procedimento</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="procedimento" value="{{$tcle->procedimento}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Anestesia</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="anestesia" value="{{$tcle->anestesia}}">
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Responsável</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="responsavel" value="{{$tcle->responsavel}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Parentesco</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="parentesco_responsavel" value="{{$tcle->parentesco_responsavel}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">RG do responsável</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="rg_responsavel" value="{{$tcle->rg_responsavel}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">CPF do responsável</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cpf_responsavel" value="{{$tcle->cpf_responsavel}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-ok"></i> Salvar
                            </button>
                            <a href="{{route('tcles.index')}}" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i> Voltar </a>
                        </div>
                    </div>
                </form>

                    {!! Form::model($tcle, ['route' => ['tcles.destroy', $tcle->id], 'id' => 'form-delete', 'method' => 'DELETE']) !!}

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
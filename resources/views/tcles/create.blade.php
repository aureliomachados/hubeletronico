@extends('app')

@section('title')
    Adicionar novo registro
@endsection

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Adicionar novo registro</h4>
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

                <form class="form-horizontal" role="form" method="POST" action="{{route('tcles.store')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Paciente</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="paciente" value="{{ old('paciente') }}">
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
                            <input type="text" class="form-control" name="rg">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Orgão</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="orgao">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">UF</label>
                        <div class="col-md-6">
                            <select name="estados_id" id="estados_id" class="form-control">
                                @foreach($estados as $estado)
                                    <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Diagnóstico</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="diagnostico"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Procedimento</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="procedimento">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Anestesia</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="anestesia">
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Responsável</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="responsavel">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Parentesco</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="parentesco_responsavel">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">RG do responsável</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="rg_responsavel">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">CPF do responsável</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cpf_responsavel">
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
                            <a href="{{route('tcles.index')}}" class="btn btn-danger"><i class="glyphicon glyphicon-backward"></i> Voltar </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
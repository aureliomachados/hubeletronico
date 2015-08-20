@extends('app')

@section('title')
    Adicionar novo usuário
@endsection

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Adicionar novo usuário</h4>
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

                <form class="form-horizontal" role="form" method="POST" action="{{route('medicos.save')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nome</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Classificação (Tipo)</label>
                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control">
                                <option value="Médico">Médico</option>
                                <option value="Secretária">Secretária</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">CRM(Se possuir)</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="crm" value="{{old('crm')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Senha</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirmar senha</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">
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
                            <a href="{{route('medicos.index')}}" class="btn btn-danger"><i class="glyphicon glyphicon-backward"></i> Voltar </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
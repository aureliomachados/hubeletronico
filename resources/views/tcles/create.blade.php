@extends('app')

@section('title')
    Adicionar novo registro
@endsection

@section('content')

    <script>
        var app = angular.module('myApp', []).config(function($interpolateProvider){
            $interpolateProvider.startSymbol('<%').endSymbol('%>');
        });

        app.controller('pacienteController', function($scope, $http){

            $scope.paciente = null;
            $scope.prontuario = null;
            $scope.mensagem = null;

            $scope.carregaPaciente = function() {
                $http.get("pacientes/busca-ajax?prontuario=" + $scope.prontuario).success(function ($response) {

                    $scope.paciente = $response.paciente;

                    if($response.paciente != null){
                        $scope.mensagem = "Nenhum paciente encontrado";
                    }

                    console.log($scope.paciente);

                });
            }
        });

    </script>

    <div class="container">

        <div class="page-header">
            <h4>Adicionar novo tcle de anestesia</h4>
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
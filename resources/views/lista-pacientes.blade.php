@extends('app')

@section('content')

    <!--<script src="/js/angular/carrega-paciente.js"></script>-->

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

    <div ng-app="myApp" ng-controller="pacienteController">


        <input type="search" ng-model="prontuario"/>
        <button ng-click="carregaPaciente()">Pesquisar</button>


    </div>

    <table>
        <tr>
            <th>Nome</th>
            <td><% paciente.nome %></td>
        </tr>
    </table>

@endsection
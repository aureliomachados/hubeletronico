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

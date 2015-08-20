@extends('app')

@section('title')
   Informações de {{$tcle->paciente}}
@endsection

@section('content')

    <div class="container">

        <div class="row">

            <!--Informações do paciente-->

            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title text-center">Informações gerais</div>

                    <div class="panel-body">

                        <div class="row">

                            <!--Informações do paciente-->
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title text-center">Paciente</div>

                                    <div class="panel-body">

                                        <table class="table">
                                            <tr>
                                                <th>Paciente</th>
                                                <td>{{$tcle->paciente}}</td>
                                            </tr>
                                            <tr>
                                                <th>Data de nascimento</th>
                                                <td>{{date('d/m/Y', strtotime($tcle->data_nascimento))}}</td>
                                            </tr>
                                            <tr>
                                                <th>RG</th>
                                                <td>{{$tcle->rg}}</td>
                                            </tr>
                                            <tr>
                                                <th>Orgão</th>
                                                <td>{{$tcle->orgao}}</td>
                                            </tr>
                                            <tr>
                                                <th>UF</th>
                                                <td>{{$tcle->estado->sigla}}</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <!-- Informações do parente -->
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title text-center">Parente/Responsável</div>

                                    <div class="panel-body">

                                        <table class="table">
                                            <tr>
                                                <th>Responsável</th>
                                                <td>{{$tcle->responsavel}}</td>
                                            </tr>
                                            <tr>
                                                <th>Parentesco</th>
                                                <td>{{$tcle->parentesco_responsavel}}</td>
                                            </tr>
                                            <tr>
                                                <th>RG</th>
                                                <td>{{$tcle->rg_responsavel}}</td>
                                            </tr>
                                            <tr>
                                                <th>CPF</th>
                                                <td>{{$tcle->cpf_responsavel}}</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Informações do procedimento -->
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title text-center">Informações do procedimento</div>

                    <div class="panel-body">

                        <table class="table">
                            <tr>
                                <th>Prontuário</th>
                                <td>{{$tcle->prontuario}}</td>
                            </tr>
                            <tr>
                                <th>Diagnóstico</th>
                                <td>{{$tcle->diagnostico}}</td>
                            </tr>
                            <tr>
                                <th>Procedimento</th>
                                <td>{{$tcle->procedimento}}</td>
                            </tr>
                            <tr>
                                <th>Anestesia</th>
                                <td>{{$tcle->anestesia}}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
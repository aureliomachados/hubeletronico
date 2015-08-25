@extends('app')

@section('title')
   Informações de {{$paciente->nome}}
@endsection

@section('content')

    <div class="container">

        <div class="row">

            <!--Informações do paciente-->

            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title text-center">Informações do paciente</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nome</th>
                                <td>{{$paciente->nome}}</td>
                            </tr>
                            <tr>
                                <th>Prontuário</th>
                                <td>{{$paciente->prontuario}}</td>
                            </tr>
                            <tr>
                                <th>Data de nascimento</th>
                                <td>{{date('d/m/Y', strtotime($paciente->data_nascimento))}}</td>
                            </tr>
                            <tr>
                                <th>RG</th>
                                <td>{{$paciente->rg}}</td>
                            </tr>
                            <tr>
                                <th>Orgão emissor: </th>
                                <td>{{$paciente->orgao}}</td>
                            </tr>
                            <tr>
                                <th>UF</th>
                                <td>{{$paciente->estado->sigla}}</td>
                            </tr>
                        </table>
                    </div>
            </div>

        </div>

    </div>

@endsection
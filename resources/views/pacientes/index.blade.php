@extends('app')

@section('title')
    Lista de registros
@stop

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Lista de pacientes</h4>
        </div>


        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">

                <span class="pull-right"> <a href="{{route('pacientes.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Novo</a></span>

                <form action="{{route('pacientes.busca')}}" method="get" class="form-inline">
                    <div class="form-group">
                        <label for="paciente" class="control-label">Prontuário</label>
                        <input type="text" name="prontuario" id="prontuario" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Buscar" class="form-control btn-primary"/>
                    </div>
                </form>

                <br/><br/>

                @if(!$pacientes->isEmpty())
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Prontuário</th>
                            <th>RG</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $paciente)
                            <tr>
                                <td>
                                    <a href="{{route('pacientes.show', ['id' => $paciente->id])}}">{{$paciente->nome}}</a>
                                </td>
                                <td>{{$paciente->prontuario}}</td>
                                <td>{{$paciente->rg}}</td>
                                <td>
                                    <a href="{{route('pacientes.edit', ['id' => $paciente->id])}}"><i class="glyphicon glyphicon-edit"></i> editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    Nenhum resultado encontrado.
                @endif

                @unless($paginado == false)
                    {!! $pacientes->render() !!}
                @endunless
            </div>
        </div>
    </div>
@stop
@extends('app')

@section('title')
    Lista de registros
@stop

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Lista de registros</h4>
        </div>


        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">

                <span class="pull-right"> <a href="{{route('tcles.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Novo</a></span>

                <form action="{{route('tcles.busca')}}" method="get" class="form-inline">
                    <div class="form-group">
                        <label for="paciente" class="control-label">Nome</label>
                        <input type="text" name="paciente" id="paciente" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Buscar" class="form-control btn-primary"/>
                    </div>
                </form>

                <br/><br/>

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
                        @foreach($tcles as $registro)
                            <tr>
                                <td><a href="{{route('tcles.show', ['id' => $registro->id])}}">{{$registro->paciente}}</a></td>
                                <td>{{$registro->prontuario}}</td>
                                <td>{{$registro->rg}}</td>
                                <td><a href="{{route('tcles.edit', ['id' => $registro->id])}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> editar</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @unless($paginado == false)
                {!! $tcles->render() !!}
                @endunless
            </div>
        </div>
    </div>
@stop
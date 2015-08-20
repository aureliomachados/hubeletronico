@extends('app')

@section('title')
    Lista de médicos
@stop

@section('content')
    <div class="container">

        <div class="page-header">
            <h4>Lista de médicos</h4>
        </div>


        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">

                <a href="{{route('medicos.create')}}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Novo</a>

                <form action="{{route('medicos.busca')}}" method="get" class="form-inline">
                    <div class="form-group">
                        <label for="crm" class="control-label">CRM</label>
                        <input type="text" name="crm" id="crm" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Buscar" class="form-control btn-primary"/>
                    </div>
                </form>

                <br/>
                <br/>

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CRM</th>
                            <th>Classificação</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicos as $medico)
                            <tr>
                                <td>{{$medico->name}}</td>
                                <td>{{($medico->crm == "") ? "Não possui" : $medico->crm}}</td>
                                <td>{{$medico->type}}</td>
                                <td><a href="{{route('medicos.edit', ['id' => $medico->id])}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> editar</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
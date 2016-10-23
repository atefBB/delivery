@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Clientes</h3>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.clients.create') }}" class="btn btn-default pull-right">Adicionar novo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Ação</th>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->user->name}}</td>
                                <td>
                                    <a href="{{route('admin.clients.edit', ['id' => $client->id])}}" class="btn btn-sm btn-warning">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-right">
                    {!! $clients->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
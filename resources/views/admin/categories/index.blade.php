@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Categorias</h3>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-default pull-right">Nova Categoria</a>
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
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-sm btn-warning">Editar</a>
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
                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
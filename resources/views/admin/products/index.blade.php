@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Produtos</h3>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.products.create') }}" class="btn btn-default pull-right">Nova Categoria</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Categoria</th
                        <th>Preço</th>
                        <th colspan="2">Ação</th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <a href="{{route('admin.products.edit', ['id' => $product->id])}}" class="btn btn-sm btn-warning">Editar</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.products.destroy', ['id' => $product->id])}}" class="btn btn-sm btn-danger">Remover</a>
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
                    {!! $products->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
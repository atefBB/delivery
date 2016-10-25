@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Cupons</h3>
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.cupoms.create')}}" class="btn btn-default pull-right">Adicionar novo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Código</th>
                        <th>Valor</th>
                    </thead>
                    <tbody>
                        @foreach($cupoms as $cupom)
                            <tr>
                                <td>{{$cupom->id}}</td>
                                <td>{{$cupom->code}}</td>
                                <td>{{$cupom->value}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-right">
                    {!! $cupoms->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
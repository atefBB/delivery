@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Pedidos</h3>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('customer.order.create') }}" class="btn btn-default pull-right">Adicionar novo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                    <th>#</th>
                    <th>Total</th>
                    <th>Status</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-right">
                    {!! $orders->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
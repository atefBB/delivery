@extends('app')
@section('content')
    <div class="container">

        @include('errors._check')

        <div class="row">
            <div class="col-sm-6">
                <h3>Pedido #{{$order->id}}</h3>
                <h4>Cliente: {{$order->client->user->name}}</h4>
                <h6>Data: {{$order->created_at}}</h6>
                <p>
                    <b>Entregar em:</b>
                    <br>
                    {{$order->client->address}} - {{ $order->client->city }} - {{ $order->client->state }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {!! Form::model($order, ['route'=>['admin.orders.update', $order->id]]) !!}

                @include('admin.orders._fields')

                <div class="row">
                    <div class="col-sm-3 form-group">
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
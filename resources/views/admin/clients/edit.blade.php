@extends('app')
@section('content')
    <div class="container">

        @include('errors._check')

        <div class="row">
            <div class="col-sm-6">
                <h3>Cliente</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {!! Form::model($client, ['route'=>['admin.clients.update', $client->id]]) !!}

                @include('admin.clients._fields')

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
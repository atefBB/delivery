@extends('app')
@section('content')
    <div class="container">

        @include('errors._check')

        <div class="row">
            <div class="col-sm-6">
                <h3>Produto</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['route'=>'admin.products.store']) !!}

                @include('admin.products._fields')

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
@extends('app')
@section('content')
    <div class="container">

        @include('errors._check')

        <div class="row">
            <div class="col-sm-6">
                <h3>Categoria</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {!! Form::model($category, ['route'=>['admin.categories.update', $category->id]]) !!}

                @include('admin.categories._fields')

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
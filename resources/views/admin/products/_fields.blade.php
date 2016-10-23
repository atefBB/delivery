<div class="row">
    <div class="col-sm-3 form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-3 form-group">
        {!! Form::label('category', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6 form-group">
        {!! Form::label('description', 'Descrição:') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' =>'3']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-3 form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>
</div>
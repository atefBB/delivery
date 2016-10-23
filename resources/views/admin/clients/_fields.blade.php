<div class="row">
    <div class="col-sm-3 form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('user[name]', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6 form-group">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::text('user[email]', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-2 form-group">
        {!! Form::label('phone', 'Telefone:') !!}
        {!! Form::text('phone', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-5 form-group">
        {!! Form::label('address', 'Endereço:') !!}
        {!! Form::textarea('address', null, ['class'=>'form-control', 'rows' => '3']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-3 form-group">
        {!! Form::label('city', 'Cidade') !!}
        {!! Form::text('city', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-2 form-group">
        {!! Form::label('state', 'Estado') !!}
        {!! Form::text('state', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-2 form-group">
        {!! Form::label('zipcode', 'CEP:') !!}
        {!! Form::text('zipcode', null, ['class'=>'form-control']) !!}
    </div>
</div>
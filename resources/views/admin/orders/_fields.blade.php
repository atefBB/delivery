<div class="row">
    <div class="col-sm-2 form-group">
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('status', $list_status, null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-2 form-group">
        {!! Form::label('user_deliveryman_id', 'Entregador:') !!}
        {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class'=>'form-control']) !!}
    </div>
</div>
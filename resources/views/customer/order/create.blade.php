@extends('app')
@section('content')
    <div class="container">

        @include('errors._check')

        <div class="row">
            <div class="col-sm-6">
                <h3>Pedido</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['route' => 'customer.order.store', 'class'=>'form']) !!}


                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label>Total: </label>
                        <p id="total">00</p>
                        <a href="#" id="btnNewItem" class="btn btn-primary">Novo item</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>Produto</tr>
                                <tr>Quantidade</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <select name="items[0][product_id]" class="form-control">
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}" data-price="{{$product->price}}"> {{$product->name}} -  R$ {{$product->price}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    {!! Form::text('items[0][qtd]', 1, ['class'=>'form-control']) !!}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 form-group">
                        {!! Form::submit('Finalizar Pedido', ['class'=>'btn btn-warning']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#btnNewItem').click(function () {
                var row    = $('table tbody > tr:last'),
                    newRow = row.clone(),
                    lenght = $('table tbody tr').length;

                    newRow.find('tr').each(function () {
                        var td = $(this),
                            input = td.find('input, select'),
                            name = input.attr('name');

                            input.attr('name', name.replace((lenght-1)+'', lenght+''));
                    });

                    newRow.find('input').val(1);
                    newRow.insertAfter(row);
                    calculateTotal();
            });
            
            function calculateTotal() {
                var total = 0,
                    trLen = $('table tbody tr').length,
                    tr = null,
                    price,
                    qtd;

                for (var i=0; i< trLen; i++){
                    tr    = $('table tbody tr').eq(i);
                    price = tr.find(':selected').data('price');
                    qtd   = tr.find('input').val(),
                    total += price * qtd;
                }

                $('#total').html(total);
            }

            $(document.body).on('click', 'select', function () {
                calculateTotal();
            });

            $(document.body).on('blur', 'input', function () {
               calculateTotal();
            });
        });

    </script>
@endsection
@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Pedido</h1>
        @include('order.partials.order-type')
        @foreach ($order->products as $product)
            <div class="form-row">
                <label class="ml-4" name="product_id[]">Produto 1:</label>
                <select class="custom-select col-sm-4 ml-4 mb-2" name="product_id[]">
                    <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                </select>
                <input type="number" name="amount[]" class="col-sm-4 ml-4 mb-2" placeholder="Quantidade" value="{{$product->item->amount}}"></input>
            </div>
        @endforeach
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <form action="{{ route('order.destroy', $order->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" >Excluir</button>
                    <a href="{{ URL::previous() }}" class="ml-3 btn btn-primary"> Voltar </a>
                </form>
            </div>
        </div>
    </div>
@endsection

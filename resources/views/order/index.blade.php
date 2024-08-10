@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Listagem de Pedidos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Número pedido</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td scope="row">{{ $order->getOrderType() }}</td>
                        <td scope="row">{{ $order->getTotal() }}</td>
                        <td scope="row"><a href="{{ route('order.show', $order->id) }}"> Mostrar</td>
                        <td scope="row"><a href="{{ route('order.edit', $order->id) }}"> Editar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

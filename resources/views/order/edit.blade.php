@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Edição de Pedido</h1>

        <form action="{{ route('order.update', $order->id) }}" method="post">
            @csrf()
            @method('PUT')
            @include('order.partials.form-create-update')
        </form>
    </div>
@endsection

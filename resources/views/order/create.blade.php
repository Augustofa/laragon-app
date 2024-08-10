@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Cadastro de Pedido</h1>
        <form role="form" class="mt-5" action="{{ route('order.store') }}" method="post">
            @csrf()
            @include('order.partials.form-create-update')
        </form>
    </div>
@endsection

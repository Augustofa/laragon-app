@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Cadastro de Produto</h1>
        <form role="form" class="mt-5" action="{{ route('products.store') }}" method="post">
            @csrf()
            @include('product.partials.form-create-update')
        </form>
    </div>
@endsection

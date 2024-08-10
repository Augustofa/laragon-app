@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Edição de Produto</h1>

        <form action="{{ route('products.update', $product->id) }}" method="post">
            @csrf()
            @method('PUT')
            @include('product.partials.form-create-update')
        </form>
    </div>
@endsection

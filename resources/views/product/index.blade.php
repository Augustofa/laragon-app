@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Listagem de Produto</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Categoria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td scope="row">{{ $product->name }}</td>
                        <td scope="row">{{ $product->description }}</td>
                        <td scope="row">{{ $product->price }}</td>
                        <td scope="row">{{ $product->stock }}</td>
                        <td scope="row">@if(isset($product->category)) {{ $product->category->name }} @else - @endif</td>
                        <td scope="row"><a href="{{ route('products.show', $product->id) }}"> Mostrar</td>
                        @can('product-edit')
                            <td scope="row"><a href="{{ route('products.edit', $product->id) }}"> Editar</td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Cadastro de Categoria</h1>
        <form role="form" class="mt-5" action="{{ route('category.store') }}" method="post">
            @csrf()
            @include('category.partials.form-create-update')
        </form>
    </div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edição de Categoria</h1>

        <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf()
            @method('PUT')
            @include('category.partials.form-create-update')
        </form>
    </div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Cadastro de Lugar</h1>

        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                createDraggableMarker();
            });
        </script>

        <form role="form" class="mt-5" action="{{ route('places.store') }}" method="post" enctype="multipart/form-data">
            @csrf()
            @include('place.partials.form-create-update')
        </form>
    </div>
@endsection

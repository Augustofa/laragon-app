@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Edição de Lugar</h1>

        <script>
            var jsonPlace = <?php echo json_encode($place) ?>;
            
            window.addEventListener('DOMContentLoaded', (event) => {
                createMarker(jsonPlace);
            });
            
        </script>

        <form action="{{ route('places.update', $place->id) }}" method="post"  enctype="multipart/form-data">
            @csrf()
            @method('PUT')
            @include('place.partials.form-create-update')
        </form>
    </div>
@endsection

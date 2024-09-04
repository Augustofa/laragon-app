@extends('layouts.master')

@section('content')

<div class="coord" data-lat="{{ $place->latitude }}" data-lng="{{ $place->longitude }}"></div>
<script>
    var jsonPlace = <?php echo json_encode($place) ?>;

    window.addEventListener('DOMContentLoaded', (event) => {
        // createMarker(-20.231800, -46.445800);
        createMarker(jsonPlace);
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ Storage::url($place->image_path)  }}" alt="{{ $place->name }}" class="img-fluid">
            <h1>{{ $place->name }}</h1>
            <p class="lead">{{ $place->sub_title }}</p>
            <p>{{ $place->description }}</p>
        </div>
        <div class="col-md-4">
            <h4>Location</h4>
            <div id="map" style="width: 400px; height: 400px; margin: auto"></div>
        </div>
    </div>
    <form action="{{ route('places.destroy', $place->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="{{ URL::previous() }}" class="ml-3 btn btn-primary"> Voltar </a>
    </form>
</div>
@endsection
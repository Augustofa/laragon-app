@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Listagem de Lugar</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Coordenadas</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Localização</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($places as $place)
                    <tr>
                        <td scope="row">{{ $place->latitude . ', ' . $place->longitude }}</td>
                        <td scope="row">{{ $place->name }}</td>
                        <td scope="row">{{ $place->location }}</td>
                        <td scope="row"><img src="{{ Storage::url('images/places/' . $place->image_path) }}" alt="{{ $place->name }}" class="image-table" width="100px"></td>
                        <td scope="row">{{ $place->description }}</td>
                        <td scope="row"><a href="{{ route('places.show', $place->id) }}"> Mostrar</td>
                        @can('place-edit')
                            <td scope="row"><a href="{{ route('places.edit', $place->id) }}"> Editar</td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do lugar"
            @if (isset($place->name)) value='{{ $place->name }}' @endif>
        @error('name')
        <div class="invalid-feedback d-block">'{{ $message }}'</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="image" class="col-sm-2 col-form-label">Imagem: </label>
    <div class="col-sm-10">
        <input type="file" id="image" name="image" accept="image/*"
            @if (isset($place->image)) value='{{ $place->image }}' @endif>
    </div>
</div>


<div class="form-group row">
    <label for="author" class="col-sm-2 col-form-label">ID Autor: </label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="author_id" name="author_id"
            @if (isset($place->author_id)) value='{{ $place->author_id }}' @endif>
    </div>
</div>


<div class="form-group row">
    <script src="{{ asset('js/map.js') }}">
        createDraggableMarker();
    </script>
    <label class="col-sm-2 col-form-label align-middle" for="location">Localização:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="location" name="location"
            @if (isset($place->location)) value='{{ $place->location }}' @endif>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="map">Mapa:</label>
    <div class="col-sm-10" style="height: 50vh;">
        @error('mapLocation')
        <div class="invalid-feedback d-block">'{{ $message }}'</div>
        @enderror

        <div id="map" class="w-100 h-100"></div>
    </div>
</div>

<div class="form-group row">
    <label for="latitude" class="col-sm-2 col-form-label">Latitude: </label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="latitude" name="latitude"
            @if (isset($place->latitude)) value='{{ $place->latitude }}' @endif>
    </div>
</div>
<div class="form-group row">
    <label for="longitude" class="col-sm-2 col-form-label">Longitude: </label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="longitude" name="longitude"
            @if (isset($place->longitude)) value='{{ $place->longitude }}' @endif>
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="description">Descrição:</label>
    <div class="col-sm-10">
        <textarea id="description" class="form-control" name="description" rows="4" cols="50"
            placeholder="Digite a descrição do lugar">@if(isset($place->description)){{ $place->description }}@endif</textarea>
        @error('description')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <input type="submit" value="Enviar" name="submit" class="btn btn-primary" />
        <a href="{{ URL::previous() }}" class="ml-3 btn btn-primary"> Voltar </a>
    </div>
</div>
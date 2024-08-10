<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do produto"
            @if (isset($category->name)) value={{ $category->name }} @endif>
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="description">Descrição:</label>
    <div class="col-sm-10">
        <textarea id="description" class="form-control" name="description" rows="4" cols="50"
            placeholder="Digite a descrição do produto">@if (isset($category->description)){{$category->description}} @endif        
        </textarea>
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

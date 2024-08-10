@include('order.partials.order-type')

    @error('products.*')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('amount.*')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

<div class="form-group">
    <div id="dynamic-selects">
        @if (isset($order))
            @foreach ($order->products as $orderProduct)
                <div class="form-row">
                    <label class="ml-4" name="product_id[]">Produto {{ $loop->index + 1 }}:</label>
                    <select class="custom-select col-sm-4 ml-4 mb-2" name="product_id[]">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if ($orderProduct->id == $product->id) selected @endif>
                                {{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="amount[]" class="col-sm-4 ml-4 mb-2" placeholder="Quantidade"
                    value="{{ $orderProduct->item->amount }}"></input>
                </div>
            @endforeach
        @else
            <div class="form-row">
                <label class="ml-4" name="product_id[]">Produto 1:</label>
                <select class="custom-select col-sm-4 ml-4 mb-2" name="product_id[]">
                    <option value="">Selecione uma opção...</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <input type="number" name="amount[]" class="col-sm-4 ml-4 mb-2" placeholder="Quantidade"></input>
            </div>
        @endif
    </div>
    <div class="form-row justify-content-center">
        <button type="button" class="btn btn-primary mt-3 mr-4" id="add-product">Adicionar Produtos</button>
        <button type="button" class="btn btn-danger mt-3" id="remove-product">Remover Produto</button>
    </div>
</div>

<div class="form-group mt-5 ml-4">
    <input type="submit" value="Enviar" name="submit" class="btn btn-primary" />
    <a href="{{ URL::previous() }}" class="ml-3 btn btn-primary"> Voltar </a>
</div>
<script>
    $(document).ready(function() {
        var selectCount = document.querySelectorAll('select').length;

        $('#add-product').click(function() {
            selectCount++;
            var newSelect = '<div class="form-row">' +
                '<label class="ml-4" for="products">Produto ' + selectCount + ':</label>' +
                '<select class="custom-select col-sm-4 ml-4 mb-2" name="product_id[]">' +
                '<option value="">Selecione uma opção...</option>';

            @foreach ($products as $product)
                newSelect += '<option value="{{ $product->id }}">{{ $product->name }}</option>';
            @endforeach

            newSelect += '</select>' +
                '<input type="number" name="amount[]" class="col-sm-4 ml-4 mb-2" placeholder="Quantidade"></input> ' +
                '</div>';
            $('#dynamic-selects').append(newSelect);
        });

        $('#remove-product').click(function() {
            if (selectCount > 1) {
                $('#dynamic-selects').children().last().remove();
                selectCount--;
            } else {
                alert("Não é possível remover o último produto.");
            }
        });

        $('#dynamic-form').submit(function(e) {
            e.preventDefault();
            console.log("Formulário submetido!");
            // Aqui você pode adicionar a lógica para enviar os dados do formulário para o backend
        });
    });
</script>

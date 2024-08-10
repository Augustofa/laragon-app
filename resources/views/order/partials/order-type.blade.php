<div class="form-group">
    @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-row">
        <label class="ml-4 align-text-bottom" for="type">Tipo de pedido:</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-4" type="radio" name="type" id="type" value="sell"
                @if (isset($order->type) and $order->type == 'sell') checked @endif>
            <label class="form-check-label" for="inlineRadio1">Venda</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="type" id="type" value="buy"
                @if (isset($order->type) and $order->type == 'buy') checked @endif>
            <label class="form-check-label" for="inlineRadio2">Compra</label>
        </div>
    </div>
</div>
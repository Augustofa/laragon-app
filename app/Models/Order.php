<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const BUY = 'buy';
    public const SELL = 'sell';

    use HasFactory;

    protected $fillable = ['type'];


    // Define the relationship with Product through the pivot table
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot('price', 'amount')
            ->selectRaw('products.*, order_product.price * amount as total_by_product')
            ->as('item');
    }

    public function getOrderType()
    {
        switch ($this->type) {
            case "buy":
                return "Compra";
                break;
            case "sell":
                return "Venda";
                break;
        }
    }

    public function getTotal()
    {
        $total= 0;
        foreach($this->products as $product){
            $total+=$product->total_by_product;
        }
        return $total;
    }

    public function stockAdjust($data){
        $items = [];
        foreach($data['product_id'] as $index=>$product_id){
            $product = Product::find($product_id);
            $amount = $data['amount'][$index];
            if($this->type == Order::BUY){
                $product->stock += $amount;
            } else {
                $product->stock -= $amount;
            }
            $product->update();
            $items[$product->id] = ['price'=> $product->price, 'amount'=> $amount];
        }
        return $items;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Order $order)
    {
        $orders = $order->all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view("order.create", compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateOrderRequest $request)
    {
        $order = Order::create([
            'type' => $request->validated('type'),
        ]);

        $items = $order->stockAdjust($request->validated());
        $order->products()->attach($items);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find((int)$id);
        if(!isset($order)){
            return back();
        }

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find((int)$id);
        if(!isset($order)){
            return back();
        }
        $products = Product::all();
        return view('order.edit', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateOrderRequest $request, string $id)
    {
        $order = Order::find((int) $id);
        $items = $order->stockAdjust($request->validated());
        $order->products()->sync($items);
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find((int)$id);
        if(!isset($order)){
            return back();
        }

        $order->products()->detach();
        $order->delete();
        return redirect()->route('order.index');
    }
}

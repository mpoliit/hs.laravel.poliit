<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->paginate(5);
        return view('admin/orders/index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products=$order->products()->get();
        return view('admin/orders/edit',compact('order','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order, Product $product)
    {
        $order->update([
            'user_name' => $request->get('user_name'),
            'user_surname' => $request->get('user_surname'),
            'user_email' => $request->get('user_email'),
            'user_phone' => $request->get('user_phone'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'address' => $request->get('address')
        ]);

        return redirect(route('admin.orders.index'))
            ->with(['status' => 'The order was successfully updated!']);
    }
}

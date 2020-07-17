<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(CreateOrderRequest $request)
    {
        $user = auth()->user();
        $cartTotal = (float) Cart::instance('cart')->total(2,'.', '');
        $cartItems = Cart::instance('cart')->content();

        if ($cartTotal>$user->balance){
            return redirect()->back()->with(['customError' => 'You don\'t have enough money on your balance.']);
        }

        $fields = $request->validated();
        $status = OrderStatus::where('type', '=', config('order_status.in_process'))->first();


        $order = Order::create([
            'user_id' => $user->id,
            'status_id' => $status->id,
            'user_name' => $fields['name'],
            'user_surname'=>$fields['surname'],
            'user_email'=> $fields['email'],
            'user_phone' => $fields['phone'],
            'country'=> $fields['country'],
            'city' => $fields['city'],
            'address' => $fields['address'],
            'total' => $cartTotal

        ]);

        $user->update([
            'balance'=>$user->balance -$cartTotal
        ]);
        foreach ($cartItems as $item){
            $order->products()->attach($item->id,[

                'quantity' => (int) $item->qty,
                'price' => $item->price

            ]);
        }
        Cart::instance('cart')->destroy();

        return redirect()->route('thankyou', compact('order'));

    }
}

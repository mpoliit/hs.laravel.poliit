<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request, Product $product)
    {
        Cart::instance('cart')->add(
            $product->id,
            $product->name,
            $request->product_count,
            $product->getPrice()
        );
        return redirect()->back()->with(['status' => 'The product was added to cart']);
    }
    public function update(Request $request, Product $product)
    {
        if ($request->product_count > $product->quantity){
            return redirect()->back()->with(['customError'=> "Product count should be less then {$product->quantity}"]);
        }
        Cart::instance('cart')->update(
            $request->rowId,
            $request->product_count
        );

        return redirect()->back()->with(['status'=> "The product \"{$product->name} \" count was updated!"]);

    }
    public function delete(Request $request, Product $product)
    {
        Cart::instance('cart')->remove($request->rowId);
        return redirect()->back()->with(['status'=> "The product \"{$product->name} \" count was deleted!"]);
    }
}

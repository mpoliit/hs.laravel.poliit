<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(Product $product)
    {
        $comments = $product->comments()->with('user')->get();

        return view('products.show', compact('product', 'comments'));
    }
}

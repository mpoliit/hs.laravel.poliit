<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add(Product $product, Request $request)
    {
        $product->rateOnce($request->star);

        return redirect()->back()->with(['status' => 'Your rating was added']);
    }
}

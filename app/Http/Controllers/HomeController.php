<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::with('category')->paginate(10);
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }
}

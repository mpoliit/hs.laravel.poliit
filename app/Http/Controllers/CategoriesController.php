<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function show(Category $category)
    {
        $products = $category->products()->get();

        return view('categories.show', compact('category', 'products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function add(Request $request,Product $product)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = auth()->id();
        $product->comments()->create($data);

        return redirect()->back()->with(['status' => 'Comment was added!']);
    }
}

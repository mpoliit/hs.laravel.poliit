<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\WishListService;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function userList()
    {
        return view('account/wishlist');
    }
    public function add(Product $product,WishListService $service)
    {
        $service->addItem($product);

        return redirect()->back()->with(['status' => 'The product was added to your wish list!']);
    }
    public function delete(Request $request,Product $product,WishListService $service)
    {
        $service->deleteItem($request->rowId,$product);

        return redirect()->back()->with(['status' => 'The product ('.$product->name .') was deleted from your wish list!']);
    }
}

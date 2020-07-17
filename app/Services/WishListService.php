<?php


namespace App\Services;


use App\Models\Product;
use App\Services\Contract\WishListServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishListService implements WishListServiceInterface
{

    public function isUserFollowed(Product $product)
    {
        $follower = $product->followers()->where('user_id', auth()->id())->first();
        return !is_null($follower);
    }

    public function addItem(Product $product)
    {
        $user = auth()->user();
        $user->addToWish($product);
        Cart::instance('wishlist')->restore($user->instanceCartName());
        Cart::instance('wishlist')->add(
            $product->id,
            $product->name,
            1,
            $product->getPrice()
        );
        Cart::instance('wishlist')->store($user->instanceCartName());
    }

    public function deleteItem(string $rowId, Product $product)
    {
        auth()->user()->removeFromWish($product);
        Cart::instance('wishlist')->remove($rowId);
    }
}

<?php

namespace App\Services\Contract;

use App\Models\Product;

interface WishListServiceInterface
{
    public function isUserFollowed(Product $product);

    public function addItem(Product $product);

    public function deleteItem(string $rowId, Product $product);

}

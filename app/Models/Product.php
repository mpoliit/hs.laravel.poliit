<?php

namespace App\Models;

use Gloudemans\Shoppingcart\CanBeBought;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Buyable
{
    use CanBeBought;

    protected $fillable = [
        'id',
        'category_id',
        'SKU',
        'name',
        'description',
        'short_description',
        'price',
        'discount',
        'quantity',
        'thumbnail'
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(\App\Models\Order::class, 'order_products','order_id','product_id')
            ->withPivot('quantity','price');
    }

    public function image()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }

    public function printPrice():string
    {
        return  $this->getPrice() . __('$');
    }

    public function getPrice():string
    {
        $price = $this->price;

        if($this->discount >0){
            $price -= ($price /100 * $this->discount);
        }
        return round($price, 2);
    }
}

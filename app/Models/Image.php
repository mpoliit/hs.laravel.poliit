<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Image extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'path', 'imageable_id', 'imageable_type'];

    protected $hidden = ['imageable_id', 'imageable_type'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphToMany(\App\Models\Product::class, 'imageable');
    }

    public function categories()
    {
        return $this->morphToMany(\App\Models\Category::class, 'imageable');
    }

//    public function setPathAttribute(string $file)
//    {
//        $this->path = $imageSerice->upload($file);
//    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id','parent_id','user_id', 'comment','commentable_id', 'commentable_type','created_at'];
    protected $hidden = ['commentable_id', 'commentable_type'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphToMany(\App\Models\Product::class, 'commentable');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function childes()
    {
        return Comment::where('parent_id', $this->id)->get();
    }
}

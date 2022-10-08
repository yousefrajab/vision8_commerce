<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory ,Trans ,SoftDeletes ;
    protected $guarded = [];

    public function category( )
    {
        return $this->belongsTo(Category::class,'category_id')->withDefault();
    }

    public function reviews( )
    {
        return $this->hasMany(Review::class);
    }

    public function carts( )
    {
        return $this->hasMany(Cart::class);
    }

    public function order_items( )
    {
        return $this->hasMany(OrderItem::class);
    }
// عرض المنتج مع صورو
    public function album()
    {
        return $this->hasMany(Image::class);
    }


}

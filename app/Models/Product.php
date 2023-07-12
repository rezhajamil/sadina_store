<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function tags()
    {
        return $this->hasMany(ProductTag::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}

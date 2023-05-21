<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}

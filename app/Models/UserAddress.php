<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'users_address';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

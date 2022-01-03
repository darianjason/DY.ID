<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function detail()
    {
        return $this->hasOne(Detail::class);
    }

    public function cart()
    {
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id')->withPivot('quantity');
    }
}

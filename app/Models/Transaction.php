<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionDetails()
    {
        return $this->belongsToMany(Product::class, 'transaction_details', 'transaction_id', 'product_id')->withPivot('quantity', 'subtotal');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $with = ['products', 'customer', 'vendor'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'buyer', 'email');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'seller', 'email');
    }
}
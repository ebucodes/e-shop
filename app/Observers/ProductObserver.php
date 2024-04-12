<?php
// App\Observers\ProductObserver.php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function updating(Product $product)
    {
        if ($product->quantity == 0) {
            $product->status = 'out_of_stock';
        }
    }
}
<?php

namespace App\Observers;

use App\Models\Product;
use App\Notifications\ProductUpdateNotification;
use App\Services\FileStorageService;

class ProductObserver
{
    public function updated(Product $product)
    {
        $old_count = $product->getOriginal('in_stock');
        $old_price = $product->getOriginal('end_price');

        if(($old_count <= 0 && $old_count < $product->in_stock) || $old_price > $product->endPrice){
            $product->followers()
                ->get()
                ->each
                ->notify(new ProductUpdateNotification);
        }
    }

    public function deleted(Product $product)
    {
        if($product->images()->count() > 0){
            $product->images->each->delete();
        }
        FileStorageService::remove($product->thumbnail);
    }


}

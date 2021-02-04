<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Shop::class)->withPivot('count')->withTimestamps();
    }

    public function totalSumCart()
    {
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->totalCostProductCart($product->pivot->count);
        }
        return $sum;
    }

    public function countCart()
    {
        $count = count($this->products());
        return $count;
    }
}

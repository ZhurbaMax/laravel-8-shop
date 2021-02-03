<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title_product',
        'price',
        'brand',
        'image',
        'description'
    ];

    public function totalCostProductCart($count)
    {
        return $this->price * $count;
    }
}

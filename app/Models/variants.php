<?php

namespace App\Models;

use App\Models\products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class variants extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'product_id',
        'name',
        'stock',
        'price',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    protected static function booted()
    {
        static::saving(function ($variant) {
            $variant->products->updateStock();
        });

        static::deleting(function ($variant) {
            $variant->products->updateStock();
        });
    }
}

<?php

namespace App\Models;

use App\Models\variants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'rating',
        'stock',
    ];

    public function variants()
    {
        return $this->hasMany(Variants::class, 'product_id');
    }

    public function updateStock()
    {
        $this->stock = $this->variants()->sum('stock');
        $this->save();
    }
}

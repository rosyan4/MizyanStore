<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity_change',
        'new_stock',
        'source',
        'description',
        'sourceable_type',
        'sourceable_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sourceable()
    {
        return $this->morphTo();
    }
}
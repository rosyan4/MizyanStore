<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'category_id',
        'image',
        'additional_images',
        'stock',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'additional_images' => 'array',
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function stockHistories(): HasMany
    {
        return $this->hasMany(StockHistory::class);
    }

    public function getAdditionalImagesUrlsAttribute(): array
    {
        if (empty($this->additional_images)) {
            return [];
        }

        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->additional_images);
    }

    public function decreaseStock(int $quantity, $source = 'order', $sourceable = null): bool
    {
        if ($this->stock < $quantity) {
            throw new \RuntimeException('Insufficient stock for product ' . $this->id);
        }

        $this->stock -= $quantity;
        $saved = $this->save();

        if ($saved) {
            $this->recordStockChange(-$quantity, $source, $sourceable);
        }

        return $saved;
    }

    public function increaseStock(int $quantity, $source = 'return', $sourceable = null): bool
    {
        $this->stock += $quantity;
        $saved = $this->save();

        if ($saved) {
            $this->recordStockChange($quantity, $source, $sourceable);
        }

        return $saved;
    }

    protected function recordStockChange(int $quantityChange, string $source, $sourceable = null): void
    {
        $this->stockHistories()->create([
            'quantity_change' => $quantityChange,
            'new_stock' => $this->stock,
            'source' => $source,
            'description' => "Stock {$source} for product {$this->name}",
            'sourceable_type' => $sourceable ? get_class($sourceable) : null,
            'sourceable_id' => $sourceable ? $sourceable->id : null,
        ]);
    }

    public function isNew(): bool
    {
        return $this->created_at->gt(now()->subDays(30));
    }
}

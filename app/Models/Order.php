<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'total_amount',
        'payment_method',
        'shipping_address',
        'notes',
        'phone_number',
        'payment_proof',
        'paid_at',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    public const STATUSES = [
        'pending' => 'Menunggu Pembayaran',
        'payment_verification' => 'Verifikasi Pembayaran',
        'payment_accepted' => 'Pembayaran Diterima',
        'payment_rejected' => 'Pembayaran Ditolak',
        'awaiting_reupload' => 'Menunggu Upload Ulang',
        'processing' => 'Diproses',
        'delivering' => 'Sedang Diantar',
        'completed' => 'Selesai',
        'cancelled' => 'Dibatalkan'
    ];

    public const PAYMENT_METHODS = [
        'gopay' => 'GoPay',
        'ovo' => 'OVO',
        'dana' => 'DANA',
        'qris' => 'QRIS',
        'bank_transfer' => 'Bank Transfer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusBadgeAttribute(): array
    {
        $statuses = [
            'pending' => ['color' => 'warning', 'text' => 'Menunggu Pembayaran'],
            'payment_verification' => ['color' => 'info', 'text' => 'Verifikasi Pembayaran'],
            'payment_accepted' => ['color' => 'success', 'text' => 'Pembayaran Diterima'],
            'payment_rejected' => ['color' => 'danger', 'text' => 'Pembayaran Ditolak'],
            'awaiting_reupload' => ['color' => 'warning', 'text' => 'Menunggu Upload Ulang'],
            'processing' => ['color' => 'primary', 'text' => 'Diproses'],
            'delivering' => ['text' => 'Sedang Diantar', 'color' => 'primary'],
            'completed' => ['color' => 'success', 'text' => 'Selesai'],
            'cancelled' => ['color' => 'danger', 'text' => 'Dibatalkan']
        ];

        return $statuses[$this->status] ?? ['color' => 'secondary', 'text' => $this->status];
    }

    public function getFormattedPaidAtAttribute(): ?string
    {
        return $this->paid_at?->format('d M Y H:i');
    }
}
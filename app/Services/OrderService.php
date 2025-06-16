<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function updateOrderStatus(Order $order, string $status, ?string $notes = null): void
    {
        $updates = ['status' => $status];
        
        if ($status === 'completed') {
            $updates['completed_at'] = now();
        } elseif ($status === 'cancelled') {
            $updates['cancelled_at'] = now();
        }

        if ($notes !== null) {
            $updates['admin_notes'] = $notes;
        }

        $order->update($updates);
    }
}
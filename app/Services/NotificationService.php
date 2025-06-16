<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;

class NotificationService
{
    protected string $whatsappNumber;

    public function __construct()
    {
        $this->whatsappNumber = env('WHATSAPP_NUMBER', '628123456789');
    }


    public function generateWhatsAppLink(string $message, ?string $number = null): string
    {
        $targetNumber = $number ?? $this->whatsappNumber;
        $encodedMessage = urlencode($message);
        return "https://wa.me/{$targetNumber}?text={$encodedMessage}";
    }

    public function sendEmail(string $to, string $subject, string $body): void
    {
        try {
            Mail::raw($body, function ($message) use ($to, $subject) {
                $message->to($to)->subject($subject);
            });
        } catch (\Exception $e) {
            Log::error("Gagal mengirim email ke {$to}: " . $e->getMessage());
        }
    }

    public function log(string $message, string $level = 'info'): void
    {
        Log::{$level}("[Notifikasi] " . $message);
    }

    public function notifyUser($user, string $message): void
    {
        if ($user->email) {
            $this->sendEmail($user->email, 'Notifikasi dari Mizyan Store', $message);
        }

        if ($user->phone_number) {
            $waLink = $this->generateWhatsAppLink($message, $user->phone_number);
            // Bisa return link ini ke frontend, atau dikirim via metode lain
            Log::info("Link WA untuk {$user->name}: {$waLink}");
        }

        $this->log("Notifikasi untuk {$user->name}: {$message}");
    }

    public function sendOrderCompletedNotification(Order $order): void
    {
        $message = "Halo {$order->user->name}, pesanan Anda #{$order->order_number} telah *SELESAI*. Terima kasih telah berbelanja di Mizyan Store!";
        $this->notifyUser($order->user, $message);
    }

    public function sendOrderCancelledNotification(Order $order): void
    {
        $message = "Hai {$order->user->name}, pesanan Anda #{$order->order_number} telah *DIBATALKAN*. Jika ini tidak sesuai, hubungi kami segera.";
        $this->notifyUser($order->user, $message);
    }
}

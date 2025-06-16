<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactReplyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Balasan untuk pesan Anda: ' . $this->contact->subject)
                    ->line('Anda menerima balasan untuk pesan Anda:')
                    ->line('Subjek: ' . $this->contact->subject)
                    ->line('Balasan: ' . $this->contact->admin_reply)
                    ->action('Lihat Pesan', url('/contact'))
                    ->line('Terima kasih telah menghubungi kami!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Anda menerima balasan untuk pesan: ' . $this->contact->subject,
            'link' => '/contact',
            'contact_id' => $this->contact->id
        ];
    }
}
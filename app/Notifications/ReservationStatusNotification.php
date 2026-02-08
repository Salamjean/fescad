<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationStatusNotification extends Notification
{
    use Queueable;

    protected $reservation;
    protected $status; // 'accepted' or 'rejected'

    /**
     * Create a new notification instance.
     */
    public function __construct($reservation, $status)
    {
        $this->reservation = $reservation;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = 'Statut de votre réservation - FESCAD';
        if ($this->status == 'accepted') {
            $subject = 'Confirmation de votre réservation - FESCAD';
        } elseif ($this->status == 'rejected') {
            $subject = 'Mise à jour de votre réservation - FESCAD';
        }

        return (new MailMessage)
            ->subject($subject)
            ->from('infos@plateau-apps.com', 'FESCAD')
            ->view('emails.reservation_status', [
                'reservation' => $this->reservation,
                'status' => $this->status
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

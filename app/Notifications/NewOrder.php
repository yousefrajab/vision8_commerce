<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;

class NewOrder extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // $notification_channel = 'mail , database , boradcast';
        // $notification_channel = 'database,broadcast,vonage ';
        // $channels = explode(',', $notification_channel);

        $notification_channel ='vonage';
        $channels = explode(',' ,$notification_channel);
        // return ['vonage'];
             return $channels;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }
    public function toVonage($notifiable)
{
    return (new VonageMessage)
                // ->content('مرحبا معك الدعم الفني')->unicode();
                ->content('Hello');
}
    // public function toDatabase()
    // {
    //     return [
    //         'data' => 'There is new Order('.$this->order->user->name.') With Number (#'.$this->order->id.')',
    //         'url' => url('/')
    //     ];
    // }

    // public function toBroadcast()
    // {
    //     return [
    //         'data' => 'There is new Order('.$this->order->user->name.') With Number (#'.$this->order->id.')',
    //         'url' => url('/')
    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'data' => 'There is new Order(' . $this->order->user->name . ') With Number (#' . $this->order->id . ')',
            'url' => url('/')
        ];
    }
}

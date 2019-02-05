<?php

namespace App\Notifications;

use App\Models\City;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

/**
 * Class CharterNotification
 *
 * @package App\Notifications
 */
class CharterNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Variable for the newly charter status.
     *
     * @return string
     */
    public $status;

    /**
     * variable for the city that is attached to the charter.
     *
     * @return City
     */
    public $city;

    /**
     * Create a new notification instance.
     *
     * @param  string $status   The newly status from the chapter.
     * @param  City   $city     The resource entity from the city that is attached to the chapter.
     * @return void
     */
    public function __construct(string $status, City $city)
    {
        $this->status = $status;
        $this->city   = $city;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return ['message' => "Has given {$this->city->name} the nuclear free status. And is hereby accepting the charter."];
    }
}

<?php

namespace App\Repositories;

use App\Interfaces\CityInterface;
use App\Notifications\CharterNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Notifications;

/**
 * Class CityRepository
 *
 * @package App\Repositories
 */
class CityRepository extends Model implements CityInterface
{
    /**
     * Check if the postal code has the given charter status.
     *
     * @return bool
     */
    public function hasStatus(string $status): bool
    {
        return $this->postal->charter_status === $status;
    }

    /**
     * Method for getting the cities defined by status.
     *
     * @param  string $status The given status from the cities you want to display.
     * @return Builder
     */
    public function getByStatus(string $status): Builder
    {
        return $this->whereHas('postal', function ($query) use ($status) {
            $query->whereCharterStatus($status); // Results in WHERE charter_status = <status>;
        });
    }

    /**
     * Method for sending out notifications to the city followers.
     *
     * @param  string $status The name from the newly status that is assigned to the city.
     * @return void
     */
    public function sendCharterNotification(string $status): void
    {
        $notificationInstance = new CharterNotification($status, $this);
        $when = now()->addMinute();

        Notification::send($this->followers()->get(), ($notificationInstance)->delay($when));
    }

    /**
     * Get all the public notations for the given city.
     *
     * @return HasMany
     */
    public function getNotations(): HasMany
    {
        return $this->notations()->whereStatus(true);
    }
}

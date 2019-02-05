<?php

namespace App\Repositories;

use App\Interfaces\FlashInterface;
use Laracasts\Flash\FlashNotifier;

/**
 * Class FlashRepository
 *
 * @package App\Repositories
 */
class FlashRepository implements FlashInterface
{
    /**
     * Flash a message.
     *
     * @param  string $message The actual flash message.
     * @param  string $title   The title for the flash message.
     * @return FlashNotifier
     */
    public function message(string $message, string $title): FlashNotifier
    {
        return flash('<strong class="mr-2">' . $title . '</strong>' . $message);
    }

    /**
     * Flash an danger message.
     *
     * @param  string $message  The actual flash message
     * @param  string $title    The title for the flash message defaults to "Danger!"
     * @return FlashNotifier
     */
    public function danger(string $message, string $title = 'Danger!'): FlashNotifier
    {
        return $this->message($message, $title)->danger();
    }

    /**
     * Flash an warning message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message. Defaults to "Warning!"
     * @return FlashNotifier
     */
    public function warning(string $message, string $title = 'Warning!'): FlashNotifier
    {
        return $this->message($message, $title)->warning();
    }

    /**
     * Flash an success message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message. Defaults to "Success!"
     * @return FlashNotifier
     */
    public function success(string $message, string $title = 'Success!'): FlashNotifier
    {
        return $this->message($message, $title)->success();
    }

    /**
     * Flash an info message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message. Defaults to "Info!"
     * @return FlashNotifier
     */
    public function info(string $message, string $title = 'Info!'): FlashNotifier
    {
        return $this->message($message, $title)->info();
    }
}

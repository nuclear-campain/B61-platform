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
     * @param string $message
     * @param string $title
     * @return FlashNotifier
     */
    public function message(string $message, string $title): FlashNotifier
    {
        // TODO: Implement message() method.
    }

    /**
     * @param string $message
     * @param string $title
     * @return FlashNotifier
     */
    public function danger(string $message, string $title = 'Danger!'): FlashNotifier
    {
        // TODO: Implement danger() method.
    }

    /**
     * @param string $message
     * @param string $title
     * @return FlashNotifier
     */
    public function warning(string $message, string $title = 'Warning!'): FlashNotifier
    {
        // TODO: Implement warning() method.
    }

    /**
     * @param string $message
     * @param string $title
     * @return FlashNotifier
     */
    public function success(string $message, string $title = 'Success!'): FlashNotifier
    {
        // TODO: Implement success() method.
    }

    /**
     * @param string $message
     * @param string $title
     * @return FlashNotifier
     */
    public function info(string $message, string $title = 'Info!'): FlashNotifier
    {
        // TODO: Implement info() method.
    }
}
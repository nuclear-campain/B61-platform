<?php

namespace App\Interfaces;

use Laracasts\Flash\FlashNotifier;

/**
 * Interface FlashInterface
 *
 * @package App\Interfaces
 */
interface FlashInterface
{
    public function message(string $title, string $message): FlashNotifier;

    public function success(string $title, string $message): FlashNotifier;

    public function danger(string $title, string $message = 'Danger!'): FlashNotifier;

    public function warning(string $title, string $message = 'Warning!'): FlashNotifier;

    public function info(string $title, string $message = 'Info!'): FlashNotifier;
}
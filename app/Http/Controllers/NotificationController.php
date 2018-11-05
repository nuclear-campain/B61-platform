<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

/**
 * Class NotificationController
 * 
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{
    /**
     * NotificationController constructor. 
     * 
     * @return void 
     */
    public function __construct() 
    {
        parent::__construct();
        $this->middleware(['auth']);
    }

    /**
     * Get the index page for the notifications from the authenticated user. 
     * 
     * @param  null|string $type The type of notifications that u want to display.
     * @return view
     */
    public function index(?string $type = null): View
    {
        switch ($type) {
            case 'all':
                $notifications = $this->auth->user()->notifications()->simplePaginate(10);
                $type = 'all';
                break;

            default: // No type parameter given so display unread notifications as default.
                $notifications = $this->auth->user()->unreadNotifications()->simplePaginate(10);
                $type = 'read';
                break;
        }

        return view('notifications.index', compact('notifications', 'type'));
    }

    /**
     * Mark all the unread notifications for a user as read.
     *
     * @return RedirectResponse
     */
    public function markAsRead(): RedirectResponse
    {
        $this->auth->user()->unreadNotifications()->maskAsRead();
        return redirect()->back(); // Return rout route notifications.index
    }
}

<?php

namespace App\Composers;

use App\User;
use Carbon\Carbon;
use Illuminate\View\View;

/**
 * Class DashboardComposer
 *
 * @package App\Composers
 */
class DashboardComposer
{
    /**
     * Method for binding data to the view
     *
     * @param  View $view The builder instance for the blade view.
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('countUsers', $this->userCounters());
    }

    /**
     * Implement the user counters for the admin dashboard panel.
     *
     * @return array
     */
    protected function userCounters(): array
    {
        return [
            'total' => str_replace(',', '.', User::count()),
            'today' => str_replace(',', '.', User::whereDate('created_at', Carbon::today())->count()),
        ];
    }

    /**
     * Function for formatting the output number.
     *
     * @param  int $total the total amount of cities with the given status.
     * @return string
     */
    protected function formatTotal(int $total = 0): string
    {
        return number_format($total);
    }
}

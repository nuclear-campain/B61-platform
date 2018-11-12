<?php 

namespace App\Composers; 

use Illuminate\View\View;
use App\Models\Postal;

/**
 * Class MonitorComposer 
 * 
 * @package App\Composers
 */
class MonitorComposer
{
    /**
     * Method for binding data to the view. 
     * 
     * @param  View $view The builder instance for the blade view. 
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('countAccepted', $this->countCities('Accepted'));
        $view->with('countRejected', $this->countCities('Rejected'));
        $view->with('countPending', $this->countCities('Pending'));
    }

    /**
     * Count all the postal codes that has the given charter status. 
     * 
     * @param  string $status The status form the charter. 
     * @return string
     */
    protected function countCities(string $status): string
    {
        $total = $this->formatTotal(Postal::whereCharterStatus($status)->count());
        return str_replace(',', '.', $total);
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
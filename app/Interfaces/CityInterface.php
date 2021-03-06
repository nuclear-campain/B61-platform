<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface CityRepository
 *
 * @package App\Interfaces
 */
interface CityInterface
{
    /**
     * Check if the postal code has the given charter status.
     *
     * @param  string $status The given status from the charter.
     * @return bool
     */
    public function hasStatus(string $status): bool;

    /**
    * Method for getting the cities defined by status.
    *
    * @param  string $status The given status from the cities you want to display.
    * @return Builder
    */
    public function getByStatus(string $status): Builder;
}

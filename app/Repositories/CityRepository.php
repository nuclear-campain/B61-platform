<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\CityInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * Get all the public notations for the given city. 
     * 
     * @return HasMany
     */
    public function getNotations(): HasMany
    {
        return $this->notations()->whereStatus(true);
    }
}

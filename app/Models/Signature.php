<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Signature
 *
 * @package App\Models
 */
class Signature extends Model
{
    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'city', 'country'];

    /**
     * Data relation for getting the city information in the application.
     *
     * @return BelongsTo
     */
    public function cityInformation(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city')
            ->withDefault(['name' => 'Stad onbekend.']);
    }
}

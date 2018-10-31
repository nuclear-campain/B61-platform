<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class City 
 * 
 * @package App\Models
 */
class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $fillable = ['name', 'lat', 'lng'];

    /**
     * Data relation for setting/getting the province from the city. 
     * 
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class)->withDefault(['name' => 'None']);
    }

    /**
     * Data relation for getting the postal code that is attached to the city. 
     * 
     * @return BelongsTo
     */
    public function postal(): BelongsTo
    {
        return $this->belongsTo(Postal::class)->withDefault(['code' => 0000]);
    }
}

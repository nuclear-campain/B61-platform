<?php

namespace App\Models;

use App\Repositories\CityRepository;
use App\Interfaces\CityInterface;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

/**
 * Class City 
 * 
 * @package App\Models
 */
class City extends CityRepository implements CityInterface
{
    use CanBeFollowed;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $fillable = ['name', 'province_id', 'lat', 'lng'];

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
     * Data relation for getting the notations from the given city. 
     * 
     * @return HasMany
     */
    public function notations(): HasMany
    {
        return $this->hasMany(Notation::class);
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

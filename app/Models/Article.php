<?php

namespace App\Models;

use App\User;
use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Article
 *
 * @package App\Models
 */
class Article extends Model
{
    use SoftDeletes, Viewable;

    /**
     * Mass-assign fields for the storage table.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'is_draft'];

    /**
     * Relation for the author data that is attached to the article.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => ' <span class="text-danger">Deleted user</spans>'
        ]);
    }

    /**
     * Shorthand helper or getting the draft articles out. 
     * 
     * @param  Builder $query     The eloquent builder instance. 
     * @param  bool    $indicator Determine with true/false if you want to get the drafts only or not. 
     * @return Builder
     */
    public function scopeGetDraftsOnly(Builder $query, bool $indicator): Builder 
    {
        return $query->whereIsDraft($indicator);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fragment
 *
 * @package App\Models
 */
class Fragment extends Model
{
    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content'];
}

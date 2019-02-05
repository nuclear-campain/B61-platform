<?php

namespace App\Models;

use ActivismBE\Reportable\Traits\HasReports;
use BeyondCode\Comments\Comment as BaseModel;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * ---
 * Extension for the beyondcode/comment base model.
 * Needed to apply the report system to the comments.
 *
 * @package App\Models
 */
class Comment extends BaseModel
{
    use HasReports; // Apply the report methods to the model.
}

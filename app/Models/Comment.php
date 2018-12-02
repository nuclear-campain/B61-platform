<?php

namespace App\Models;

use ActivismBE\Reportable\Traits\HasReports;
use Illuminate\Database\Eloquent\Model;
use BeyondCode\Comments\Comment as BaseModel;

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

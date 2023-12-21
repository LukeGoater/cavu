<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Price extends Model
{
    use HasFactory;

    /**
     * Get the space that this price belongs to.
     */
    public function saleable(): MorphTo
    {
        return $this->morphTo();
    }
}

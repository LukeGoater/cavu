<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Space extends Model
{
    use HasFactory;

    public $fillable = [
        'identifier'
    ];

    /**
     * Get the car park that this space belongs to.
     */
    public function carPark(): BelongsTo
    {
        return $this->belongsTo(CarPark::class);
    }
}

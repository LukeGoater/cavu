<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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

    /**
     * Get the space reservations.
     */
    public function reservations(): MorphMany
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    /**
     * Only show unreserved spaces.
     */
    public function scopeUnreserved(Builder $query, Carbon $from, Carbon $to): void
    {
        $query->whereDoesntHave('reservations', fn(Builder $q) => $q->where('from', '<', $to)->where('to', '>', $from));
    }

    /**
     * Get the prices for this space
     */
    public function prices(): MorphMany
    {
        return $this->morphMany(Price::class, 'saleable');
    }
}

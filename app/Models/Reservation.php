<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reservation extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array<string>
    */
    public $fillable = [
        'user_id',
        'from', 'to',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'date',
        'to' => 'date',
    ];

    /**
     * Get the spaces for this car park
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent reservable model.
     */
    public function reservable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Calculates the price for a reservation
     */
    public function calculatePrice(): int
    {
        return collect(Carbon::parse($this->from)->daysUntil($this->to))->sum(fn ($day) => $this->reservable->price($day));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarPark extends Model
{
    use HasFactory;

    /**
     * Get the spaces for this car park
     */
    public function spaces(): HasMany
    {
        return $this->hasMany(Space::class);
    }
}

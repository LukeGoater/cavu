<?php

namespace App\Observers;

use App\Models\Reservation;

class ReservationObserver
{
    /**
     * Handle the Reservation "created" event.
     */
    public function creating(Reservation $reservation): void
    {
        $reservation->price = $reservation->calculatePrice();
    }

    /**
     * Handle the Reservation "created" event.
     */
    public function updating(Reservation $reservation): void
    {
        $reservation->price = $reservation->calculatePrice();
    }
}

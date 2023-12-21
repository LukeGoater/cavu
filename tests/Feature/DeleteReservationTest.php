<?php

use App\Models\Reservation;

use function Pest\Laravel\actingAs;

it('can delete a reservation', function () {
    $reservation = Reservation::first();

    actingAs($reservation->user)->delete('/reservations/'.$reservation->id)->assertStatus(204);
});
<?php

use App\Models\Reservation;

use function Pest\Laravel\actingAs;

it('can update a reservation', function () {
    $reservation = Reservation::first();

    actingAs($reservation->user)->put('/reservations/'.$reservation->id, [
        'from' => $reservation->from->addDay(),
        'to' => $reservation->to->addDay(),
    ])->assertStatus(200);
});
<?php

use App\Models\Space;
use App\Models\User;
use Carbon\Carbon;

use function Pest\Laravel\actingAs;

beforeEach(function() {
    $this->user = User::factory()->create();
    
    $this->dateInFuture = Carbon::now()->addDays(rand(1,50));
});

it('can create a reservation for a space', function () {
    $space = Space::inRandomOrder()->first();

    actingAs($this->user)->post('/spaces/'.$space->id.'/reservations', [
        'from' => $this->dateInFuture,
        'to' => $this->dateInFuture->clone()->addDay(),
    ])->assertJsonStructure([
        'data' => [
            'id',
            'from',
            'to',
            'price',
            'reservable' => [
                'id',
                'car_park_id',
                'identifier',
                'created_at',
                'updated_at',
            ],
            'created_at',
            'updated_at',
        ],
    ]);
});

it('can not create a reservation for an already reserved space', function () {
    $space = Space::first();
    
    actingAs($this->user)->post('/spaces/'.$space->id.'/reservations', [
        'from' => $this->dateInFuture->clone()->subDay(),
        'to' => $this->dateInFuture->clone()->addDay(),
    ]);
    
    $tmp = actingAs($this->user)->post('/spaces/'.$space->id.'/reservations', [
        'from' => $this->dateInFuture,
        'to' => $this->dateInFuture->clone()->addDay(),
    ])->assertStatus(422);
});
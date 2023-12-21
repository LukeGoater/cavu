<?php

use App\Models\Space;
use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function() {
    $this->user = User::factory()->create();
});

it('can get a successful car parks spaces', function () {
    $space = Space::factory()->forCarPark()->create();

    actingAs($this->user)->get('/car-parks/'.$space->carPark->id.'/spaces')->assertJsonStructure([
        'data' => [
            [
                'id',
                'identifier',
                'created_at',
                'updated_at'
            ]
        ],
        'links',
        'meta',
    ]);
});
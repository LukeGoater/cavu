<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function() {
    $this->user = User::factory()->create();
});

it('can get a successful car parks response', function () {
    actingAs($this->user)->get('/car-parks')->assertJsonStructure([
        'data' => [
            [
                'id',
                'created_at',
                'updated_at'
            ]
        ],
        'links',
        'meta',
    ]);
});
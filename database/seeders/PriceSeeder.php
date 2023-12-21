<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Space;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Space::get()->each(function(Space $space) {
            Price::factory()
                ->for($space, 'saleable')
                ->create();
        });
    }
}

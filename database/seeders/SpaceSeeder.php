<?php

namespace Database\Seeders;

use App\Models\CarPark;
use App\Models\Space;
use Illuminate\Database\Seeder;

class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Space::factory()
            ->count(10)
            ->for(CarPark::create())
            ->create();
    }
}

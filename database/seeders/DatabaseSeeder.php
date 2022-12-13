<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\House;
use App\Models\Utility;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        House::factory(10)->create();
        Utility::create([
            'name' => 'Water',
            'unit' => 'ml',
            'cost_per_unit' => 10,
            'charge_cycle' => 'Monthly',
        ]);
    }
}

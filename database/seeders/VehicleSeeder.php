<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicles::create([
            'name' => 'Toyota Hilux',
            'type_id' => '2',
            'service_date' => '2023-10-14',
        ]);
        Vehicles::create([
            'name' => 'Toyota Kijang Innova',
            'type_id' => '1',
            'service_date' => '2023-10-14',
        ]);
    }
}

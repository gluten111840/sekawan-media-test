<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::create([
            'name' => 'Pribadi - Orang',
        ]);
        VehicleType::create([
            'name' => 'Pribadi - Barang',
        ]);
        VehicleType::create([
            'name' => 'Sewa - Orang',
        ]);
        VehicleType::create([
            'name' => 'Sewa - Barang',
        ]);
    }
}

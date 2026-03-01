<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceRoom;

class ServiceRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            'Baby Spa',
            'Poli Gigi',
            'Poli KIA',
            'Poli Umum',
            'Sunat Modern',
        ];

        foreach ($rooms as $name) {
            ServiceRoom::firstOrCreate(['name' => $name]);
        }
    }
}

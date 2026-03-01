<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatments = [
            ['name' => 'Pemeriksaan Umum', 'fee' => 50000],
            ['name' => 'Vaksin Anak', 'fee' => 150000],
            ['name' => 'Cabut Gigi', 'fee' => 75000],
            ['name' => 'Sunat Modern', 'fee' => 250000],
            ['name' => 'Terapi Fisik', 'fee' => 100000],
        ];

        foreach ($treatments as $treatment) {
            Treatment::firstOrCreate(
                ['name' => $treatment['name']],
                ['fee' => $treatment['fee']]
            );
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            InsuranceSeeder::class,
            PatientSeeder::class,
            ServiceRoomSeeder::class,
            TreatmentSeeder::class,
        ]);
    }
}

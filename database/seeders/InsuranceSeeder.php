<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    public function run(): void
    {
        $insurances = [
            'BPJS Kesehatan',
            'BPJS Ketenagakerjaan',
            'Asuransi Allianz',
            'Asuransi Prudential',
            'Asuransi AXA',
            'Asuransi Jiwasraya',
            'Asuransi Mandiri InHealth',
            'Asuransi BCA Life',
            'Asuransi Sinarmas',
        ];

        foreach ($insurances as $name) {
            Insurance::firstOrCreate(['name' => $name,]);
        }
    }
}

<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'identity_number' => $this->faker->unique()->numerify('################'),
            'medical_record_number' => $this->generateMRN(),

            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'phone_number' => $this->faker->unique()->numerify('08##########'),
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,

            'blood_type' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'allergies' => $this->faker->optional()->word,
            'current_medicines' => $this->faker->optional()->word,
            'medical_history' => $this->faker->optional()->sentence,
        ];
    }

    /**
     * Generate a unique 16-character MRN
     * Public so it can be used in seeders
     */
    public function generateMRN(): string
    {
        // 16 karakter: MR + 6 timestamp + 8 random
        $timestamp = substr(now()->format('ymdHis'), -6);
        $random = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);

        return 'MR' . $timestamp . $random;
    }

    /**
     * Optional: Normalized version for case-insensitive comparison
     */
    public function normalizedName(string $name): string
    {
        return ucwords(strtolower(trim($name)));
    }
}

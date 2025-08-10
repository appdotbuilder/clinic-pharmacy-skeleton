<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\Patient>
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $insuranceProviders = [
            'Blue Cross Blue Shield',
            'Aetna',
            'Cigna',
            'UnitedHealth',
            'Humana',
            'Kaiser Permanente',
            null, // Some patients may not have insurance
        ];

        $allergies = [
            'Penicillin',
            'Sulfa drugs',
            'Peanuts',
            'Shellfish',
            'Latex',
            'Aspirin',
            null, // Some patients may have no known allergies
        ];

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'date_of_birth' => fake()->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'emergency_contact_name' => fake()->name(),
            'emergency_contact_phone' => fake()->phoneNumber(),
            'medical_history' => fake()->optional(0.7)->paragraph(),
            'allergies' => fake()->randomElement($allergies),
            'insurance_provider' => fake()->randomElement($insuranceProviders),
            'insurance_policy_number' => fake()->optional(0.8)->regexify('[A-Z]{2}[0-9]{8}'),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }

    /**
     * Indicate that the patient is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the patient is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }

    /**
     * Indicate that the patient has no insurance.
     */
    public function uninsured(): static
    {
        return $this->state(fn (array $attributes) => [
            'insurance_provider' => null,
            'insurance_policy_number' => null,
        ]);
    }

    /**
     * Indicate that the patient has no known allergies.
     */
    public function noAllergies(): static
    {
        return $this->state(fn (array $attributes) => [
            'allergies' => null,
        ]);
    }
}
<?php

namespace Database\Factories;

use App\Models\Medication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medication>
 */
class MedicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\Medication>
     */
    protected $model = Medication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $medications = [
            ['generic' => 'Acetaminophen', 'brand' => 'Tylenol', 'form' => 'Tablet'],
            ['generic' => 'Ibuprofen', 'brand' => 'Advil', 'form' => 'Tablet'],
            ['generic' => 'Amoxicillin', 'brand' => 'Amoxil', 'form' => 'Capsule'],
            ['generic' => 'Lisinopril', 'brand' => 'Prinivil', 'form' => 'Tablet'],
            ['generic' => 'Metformin', 'brand' => 'Glucophage', 'form' => 'Tablet'],
            ['generic' => 'Atorvastatin', 'brand' => 'Lipitor', 'form' => 'Tablet'],
            ['generic' => 'Omeprazole', 'brand' => 'Prilosec', 'form' => 'Capsule'],
            ['generic' => 'Hydrochlorothiazide', 'brand' => 'Microzide', 'form' => 'Tablet'],
            ['generic' => 'Prednisone', 'brand' => 'Deltasone', 'form' => 'Tablet'],
            ['generic' => 'Aspirin', 'brand' => 'Bayer', 'form' => 'Tablet'],
        ];

        $medication = fake()->randomElement($medications);
        $strength = fake()->randomElement(['5mg', '10mg', '25mg', '50mg', '100mg', '250mg', '500mg']);
        $unitCost = fake()->randomFloat(2, 0.10, 50.00);
        $sellingPrice = $unitCost * fake()->randomFloat(2, 1.5, 3.0);

        return [
            'name' => $medication['generic'],
            'generic_name' => $medication['generic'],
            'brand_name' => $medication['brand'],
            'description' => fake()->optional(0.7)->sentence(),
            'dosage_form' => $medication['form'],
            'strength' => $strength,
            'ndc_number' => fake()->optional(0.8)->regexify('[0-9]{5}-[0-9]{4}-[0-9]{2}'),
            'manufacturer' => fake()->randomElement([
                'Pfizer Inc.',
                'Johnson & Johnson',
                'Merck & Co.',
                'Bristol Myers Squibb',
                'AbbVie Inc.',
                'Novartis AG',
                'Roche Holding AG',
                'GlaxoSmithKline',
                'Sanofi',
                'AstraZeneca',
            ]),
            'unit_cost' => $unitCost,
            'selling_price' => round($sellingPrice, 2),
            'quantity_in_stock' => fake()->numberBetween(0, 1000),
            'reorder_level' => fake()->numberBetween(5, 50),
            'reorder_quantity' => fake()->numberBetween(50, 500),
            'expiration_date' => fake()->dateTimeBetween('now', '+2 years'),
            'storage_requirements' => fake()->optional(0.5)->randomElement([
                'Store at room temperature',
                'Refrigerate between 2-8°C',
                'Store in a cool, dry place',
                'Keep away from light',
                'Store below 25°C',
            ]),
            'prescription_required' => fake()->boolean(80), // 80% require prescription
            'controlled_substance' => fake()->boolean(20), // 20% are controlled substances
            'status' => fake()->randomElement(['active', 'inactive', 'discontinued']),
        ];
    }

    /**
     * Indicate that the medication is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the medication is out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'quantity_in_stock' => 0,
        ]);
    }

    /**
     * Indicate that the medication has low stock.
     */
    public function lowStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'quantity_in_stock' => fake()->numberBetween(1, 5),
            'reorder_level' => 10,
        ]);
    }

    /**
     * Indicate that the medication is over-the-counter.
     */
    public function overTheCounter(): static
    {
        return $this->state(fn (array $attributes) => [
            'prescription_required' => false,
            'controlled_substance' => false,
        ]);
    }

    /**
     * Indicate that the medication is a controlled substance.
     */
    public function controlledSubstance(): static
    {
        return $this->state(fn (array $attributes) => [
            'prescription_required' => true,
            'controlled_substance' => true,
        ]);
    }

    /**
     * Indicate that the medication is expiring soon.
     */
    public function expiringSoon(): static
    {
        return $this->state(fn (array $attributes) => [
            'expiration_date' => fake()->dateTimeBetween('now', '+30 days'),
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Medication;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClinicPharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Clinic Administrator',
            'email' => 'admin@clinic-pharmacy.local',
        ]);

        // Create additional staff users
        User::factory()->count(5)->create();

        // Create patients
        Patient::factory()
            ->count(50)
            ->active()
            ->create();

        // Create some inactive patients
        Patient::factory()
            ->count(10)
            ->inactive()
            ->create();

        // Create medications
        Medication::factory()
            ->count(100)
            ->active()
            ->create();

        // Create some medications with low stock
        Medication::factory()
            ->count(10)
            ->lowStock()
            ->create();

        // Create some medications expiring soon
        Medication::factory()
            ->count(5)
            ->expiringSoon()
            ->create();

        // Create some over-the-counter medications
        Medication::factory()
            ->count(20)
            ->overTheCounter()
            ->create();

        // Create some controlled substances
        Medication::factory()
            ->count(15)
            ->controlledSubstance()
            ->create();
    }
}
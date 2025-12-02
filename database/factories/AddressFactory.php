<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'street' => fake()->streetAddress(),
            'barangay' => fake()->citySuffix(),
            'city' => fake()->city(),
            'province' => fake()->state(),
            'region' => fake()->stateAbbr(),
            'zip_code' => fake()->postcode(),
        ];
    }
}

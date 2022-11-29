<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mobileNumber' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'national_id' => $this->faker->numberBetween(1000000, 10000000),
            'gender' => $this->faker->randomElement($array = array('male', 'female'))
        ];
    }
}

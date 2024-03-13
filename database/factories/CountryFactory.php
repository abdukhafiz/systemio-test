<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countryCode = $this->faker->countryCode();
        return [
            'name' => $this->faker->country(),
            'code' => $countryCode,
            'tax_format' => $countryCode . $this->faker->numerify('##########'),
            'tax_percent' => $this->faker->numberBetween(10, 30)
        ];
    }
}

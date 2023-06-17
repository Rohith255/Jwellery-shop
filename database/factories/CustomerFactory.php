<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->email(),
            'mobile'=>$this->faker->unique()->e164PhoneNumber(10),
            'dob'=>$this->faker->date('Y-m-d'),
            'password'=>\Hash::make('password123'),
            'address'=>$this->faker->address(20),
        ];
    }
}

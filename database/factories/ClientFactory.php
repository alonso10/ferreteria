<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'second_surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'department' => $this->faker->state,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'phone' => $this->faker->numberBetween(1000000, 9999999),
            'job' => $this->faker->jobTitle,
            'identification' => $this->faker->numberBetween(100000, 1200000000),
            'identification_type' => $this->faker->randomElement(['CC', 'RC', 'TI', 'AS', 'MS', 'PA'])
        ];
    }
}

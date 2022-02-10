<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'wor_nacionality' => $this->faker->randomElement(['Venezolana', 'Extranjera']),
            'wor_id_number' => $this->faker->unique()->randomNumber,
            'wor_pin' => $this->faker->unique()->randomNumber(6),
            'wor_name' => $this->faker->name,
            'wor_lastname' => $this->faker->name,
            'wor_email' => $this->faker->unique()->safeEmail,
            'wor_home_address' => $this->faker->address,
            'wor_type_contract' => $this->faker->randomElement(['Contratado', 'Fijo']),
            'wor_status' => $this->faker->randomElement([0,1,2]),
        ];
    }
}

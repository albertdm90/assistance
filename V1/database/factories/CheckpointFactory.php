<?php

namespace Database\Factories;

use App\Models\Checkpoint;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckpointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Checkpoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cp_description' => $this->faker->sentence(),
            'cp_code' => $this->faker->sentence(),
            'cp_status' => $this->faker->randomElement([false, true]),
            'cp_lat' => $this->faker->randomElement([$this->faker->randomNumber($nbDigits = NULL), null]),
            'cp_long' => $this->faker->randomElement([$this->faker->randomNumber($nbDigits = NULL), null]),
        ];
    }
}

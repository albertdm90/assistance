<?php

namespace Database\Factories;

use App\Models\Round;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Round::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'wor_id' => $this->faker->numberBetween($min = 1, $max = 20),
            'cp_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'rou_date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'rou_time' => $this->faker->dateTimeThisMonth()->format('H:i:s'),
            'cod_uuid' => $this->faker->dateTimeThisMonth()->format('YmdHis'),
            'rou_status' => $this->faker->numberBetween($min = 1, $max = 3),
        ];
    }
}

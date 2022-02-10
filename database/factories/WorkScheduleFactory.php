<?php

namespace Database\Factories;

use App\Models\WorkSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkSchedule::class;

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
            'ws_day' => $this->faker->numberBetween($min = 0, $max = 6),
            'ws_start_time' => $this->faker->time('H:i:m'),
            'ws_end_time' => $this->faker->time('H:i:m'),
        ];
    }
}

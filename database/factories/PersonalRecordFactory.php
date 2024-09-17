<?php

namespace Database\Factories;

use App\Models\Movement;
use App\Models\PersonalRecord;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalRecord>
 */
class PersonalRecordFactory extends Factory
{
    protected $model = PersonalRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'movement_id' => Movement::factory(),
            'value' => $this->faker->randomFloat(2, 100, 200),
            'date' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}

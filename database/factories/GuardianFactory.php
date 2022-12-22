<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GuardianFactory extends Factory
{
    protected $model = Guardian::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'birthday' => $this->faker->dateTimeThisYear(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

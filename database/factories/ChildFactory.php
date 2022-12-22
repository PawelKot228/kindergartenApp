<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ChildFactory extends Factory
{
    protected $model = Child::class;

    public function definition(): array
    {
        return [
            //'guardian_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'birthday' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

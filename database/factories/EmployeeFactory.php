<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'contract_start_date' => $this->faker->dateTimeThisYear(),
            'birthday' => $this->faker->dateTimeThisYear(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

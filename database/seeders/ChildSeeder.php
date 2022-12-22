<?php

namespace Database\Seeders;

use App\Models\Child;
use App\Models\Guardian;
use Illuminate\Database\Seeder;

class ChildSeeder extends Seeder
{
    public function run()
    {
        $guardians = Guardian::all();

        Child::factory(3000)
            ->create()
            ->each(fn(Child $child) => $guardians->random(1)->first()->children()->save($child));
    }
}

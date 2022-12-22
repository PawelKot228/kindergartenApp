<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    public function run()
    {
        Guardian::factory(1500)->create();
    }
}

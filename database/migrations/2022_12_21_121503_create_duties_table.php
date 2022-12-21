<?php

use App\Enums\DutyEnum;
use App\Models\Duty;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
        });

        Duty::create([
            'name' => DutyEnum::caretaker,
            'title' => 'Caretaker',
            'active' => 1,
        ]);

        Duty::create([
            'name' => DutyEnum::psychiatrist,
            'title' => 'Psychiatrist',
            'active' => 1,
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('duties');
    }
};

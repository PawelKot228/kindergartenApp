<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('child_absences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->date('date_from');
            $table->date('date_to');
            $table->text('comment')->nullable();
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('child_absences');
    }
};

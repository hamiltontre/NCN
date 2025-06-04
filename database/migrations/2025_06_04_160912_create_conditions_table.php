<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up()
{
    Schema::create('conditions', function (Blueprint $table) {
        $table->id();
        $table->enum('name', ['Federado', 'Novato', 'Junior', 'Principiante'])->unique();
        $table->json('schedule')->comment('Horarios en formato JSON');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conditions');
    }
};

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
    Schema::create('athletes', function (Blueprint $table) {
        $table->id();
        $table->string('first_name', 50);
        $table->string('last_name', 50);
        $table->date('birth_date');
        $table->integer('age')->nullable(); // Eliminamos el virtualAs y lo calcularemos en el modelo
        $table->string('school', 100);
        $table->boolean('is_scholarship')->default(false);
        $table->foreignId('condition_id')->constrained();
        $table->string('photo_path')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};

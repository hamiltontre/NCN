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
    Schema::create('attendance_archives', function (Blueprint $table) {
        $table->id();
        $table->string('month_year', 7)->comment('Formato YYYY-MM');
        $table->json('attendance_data')->comment('JSON con los datos completos del mes');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_archives');
    }
};

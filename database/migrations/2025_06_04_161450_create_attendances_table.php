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
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        $table->foreignId('athlete_id')->constrained();
        $table->foreignId('group_id')->constrained();
        $table->date('date');
        $table->enum('status', ['present', 'absent'])->nullable();
        $table->string('month_year', 7)->virtualAs("DATE_FORMAT(date, '%Y-%m')");
        $table->timestamps();
        
        $table->unique(['athlete_id', 'group_id', 'date']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

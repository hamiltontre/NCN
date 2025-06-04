<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $conditions = Condition::all();

    foreach ($conditions as $condition) {
        // Elimina json_decode ya que schedule ya es un array
        $schedule = $condition->schedule;

        if (isset($schedule['morning'])) {
            DB::table('groups')->insert([
                'name' => $condition->name . ' Mañana',
                'type' => 'morning',
                'condition_id' => $condition->id
            ]);
        }
        
        if (isset($schedule['afternoon'])) {
            DB::table('groups')->insert([
                'name' => $condition->name . ' Tarde',
                'type' => 'afternoon',
                'condition_id' => $condition->id
            ]);
        }
    }
}
}

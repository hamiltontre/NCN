<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Group;
use App\Models\GroupSchedule;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Limpiar tablas primero
        GroupSchedule::truncate();
        Group::truncate();
        Condition::truncate();

        // Condiciones
        $conditions = [
            ['name' => 'Federado'],
            ['name' => 'Novato'],
            ['name' => 'Junior'],
            ['name' => 'Principiante'],
        ];
        Condition::insert($conditions);

        // Grupos
        $groups = [
            ['condition_id' => 1, 'name' => 'Federados AM', 'schedule' => 'AM'],
            ['condition_id' => 1, 'name' => 'Federados PM', 'schedule' => 'PM'],
            ['condition_id' => 2, 'name' => 'Novatos PM', 'schedule' => 'PM'],
            ['condition_id' => 3, 'name' => 'Juniors PM', 'schedule' => 'PM'],
            ['condition_id' => 4, 'name' => 'Principiantes PM', 'schedule' => 'PM'],
        ];
        Group::insert($groups);

        // Días de entrenamiento (usando el modelo GroupSchedule)
        $this->createSchedules('Federados AM', [0, 1, 3, 4, 5, 6]); // Dom, Lun, Mar, Jue, Vie, Sáb
        $this->createSchedules('Federados PM', range(0, 6)); // Todos los días
        $this->createSchedules('Novatos PM', range(0, 6)); // Todos los días
        $this->createSchedules('Juniors PM', [2, 4, 6]); // Mar, Jue, Sáb
        $this->createSchedules('Principiantes PM', [2, 4, 6]); // Mar, Jue, Sáb
    }

    protected function createSchedules($groupName, $days)
    {
        $group = Group::where('name', $groupName)->first();
        
        foreach ($days as $day) {
            GroupSchedule::create([
                'group_id' => $group->id,
                'day_of_week' => $day
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('conditions')->insert([
        [
            'name' => 'Federado',
            'schedule' => json_encode([
                'morning' => ['days' => ['Mon','Tue','Thu','Fri','Sat'], 'time' => '5:30-6:50'],
                'afternoon' => ['days' => ['Mon','Tue','Wed','Thu','Fri','Sat'], 'time' => '15:00-17:00']
            ])
        ],
        [
            'name' => 'Novato',
            'schedule' => json_encode([
                'afternoon' => ['days' => ['Mon','Tue','Wed','Thu','Fri','Sat'], 'time' => '14:30-15:30']
            ])
        ],
        [
            'name' => 'Junior',
            'schedule' => json_encode([
                'afternoon' => ['days' => ['Tue','Thu','Sat'], 'time' => '14:30-15:30']
            ])
        ],
        [
            'name' => 'Principiante',
            'schedule' => json_encode([
                'afternoon' => ['days' => ['Tue','Thu','Sat'], 'time' => '14:30-15:30']
            ])
        ]
    ]);
}
}

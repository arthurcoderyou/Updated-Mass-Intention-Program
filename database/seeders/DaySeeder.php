<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $DaysOfTheWeek = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];

        foreach($DaysOfTheWeek as $day_key => $day_value){
            DB::table('days')->insert([
                'name' => $day_value,       // Assuming you want to insert the index as 'day_key'
                'created_at' => now(),       // Assuming you have a created_at column
                'updated_at' => now(),       // Assuming you have an updated_at column
            ]);
        }

    }
}

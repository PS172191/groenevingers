<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create([
            'start_time' => '2024-03-20 09:00:00',
            'finish_time' => '2024-03-20 17:00:00',
            'comments' => $this->generateComments(),
            'user_id' => '1',
            'type_id' => '1',
        ]);
        Appointment::create([
            'start_time' => '2024-03-20 09:00:00',
            'finish_time' => '2024-03-20 17:00:00',
            'comments' => $this->generateComments(),
            'user_id' => '2',
            'type_id' => '1',
        ]);
    }

    private function generateComments()
    {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    }
}

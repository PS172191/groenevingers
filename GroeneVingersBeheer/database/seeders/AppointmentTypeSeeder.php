<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class AppointmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Type::create(['name' => 'shift']);
        Type::create(['name' => 'illness']);
        Type::create(['name' => 'vacation']);
        Type::create(['name' => 'paternal leave']);
    }
}

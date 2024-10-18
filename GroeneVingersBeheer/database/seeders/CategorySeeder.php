<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id' => 1,
            'name' => 'Kamerplanten',
            'description' => 'Dit weergeeft alle kamerplanten.',
        ]);
        Category::create([
            'name' => 'Tuinplanten',
            'description' => 'Dit weergeeft alle tuinplanten.',
        ]);
        Category::create([
            'name' => 'Tuingereedschap',
            'description' => 'Dit weergeeft alle tuingereedschappen.',
        ]);
        Category::create([
            'name' => 'Tuininrichting',
            'description' => 'Dit weergeeft alle tuininrichting.',
        ]);
        Category::create([
            'name' => 'Plantverzorging',
            'description' => 'Dit weergeeft alle plantverzorging.',
        ]);
        Category::create([
            'name' => 'Potterie',
            'description' => 'Dit weergeeft alle potterie.',
        ]);
        Category::create([
            'name' => 'BBQ',
            'description' => 'Dit weergeeft alle bbq.',
        ]);
        Category::create([
            'name' => 'Bloemen',
            'description' => 'Dit weergeeft alle bloemen.',
        ]);
        Category::create([
            'name' => 'Tuinmeubelen',
            'description' => 'Dit weergeeft alle tuinmeubelen.',
        ]);
    }
}

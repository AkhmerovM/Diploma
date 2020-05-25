<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create([
            'name'     => 'Programming',
        ]);
        Category::create([
            'name'     => 'web',
        ]);
        Category::create([
            'name'     => 'Programming languages',
        ]);
    }
}

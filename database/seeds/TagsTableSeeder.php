<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        Tag::create([
            'name'     => 'Javascript',
        ]);
        Tag::create([
            'name'     => 'Http',
        ]);
        Tag::create([
            'name'     => 'Web',
        ]);
    }
}

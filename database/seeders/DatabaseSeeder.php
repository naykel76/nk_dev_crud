<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\Page::factory(10)->create();

        $this->call(PageSeeder::class);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Program;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Program::factory()->create(); // Creates Beginner by default
        Program::factory()->intermediate()->create();
        Program::factory()->advance()->create();
    }
}

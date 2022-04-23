<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)
        ->hasPlayers(1)
        ->create();
        \App\Models\Position::factory(5)
        ->hasPlayers(5)
        ->create();
    }
}
